<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;

class OrderAttachment extends Model
{
    use SoftDeletes;

    public static function order_attachments($order_id)
    {
    	return self::where([
    		'order_id' => $order_id,
    		'status' => Config::get('constants.status.active')
    	])->get();
    }

    public static function upload_attachments($documents, $order_id)
    {
    	foreach ($documents as $keyD => $valueD)
    	{
    		if ($valueD->isValid())
    		{
				$original_filename = $valueD->getClientOriginalName();
				$destination_path = 'uploads/OrderAttachments';
				$filename = time() . "__" . str_replace(" ", "", str_replace("-", "", $original_filename));
				if ($valueD->move(public_path($destination_path), $filename))
				{
					$document = new OrderAttachment();
					$document->order_id = $order_id;
					$document->attachment_name = $original_filename;
					$document->attachment_path = $destination_path . '/' . $filename;
					$document->status = Config::get('constants.status.active');
					$document->created_at = date('Y-m-d H:i:s');
					$document->save();
				}
    		}
    	}

    	return true;
    }

    public static function delete_attachment($attachment_id)
    {
		return self::where([
			'id' => $attachment_id
		])
		->update([
			'status' => Config::get('constants.status.inactive'),
			'deleted_at' => date('Y-m-d H:i:s')
		]);
    }
}
