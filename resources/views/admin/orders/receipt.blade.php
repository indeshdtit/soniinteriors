<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
        body{
            padding: 15px;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            border-collapse: collapse;
            background-color: transparent;
        }
        .table-bordered, .table-bordered td, .table-bordered th{
            border: 1px solid #dee2e6;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .table td, .table th {
            padding: .50rem;
            vertical-align: top;
        }
        h2{
            margin: 0px;
        }
        .top-right-table{
            border-collapse: collapse;
        }
        .top-right-table td{
            border: 1px solid;
        }
        .top-right-table tr:first-child td{
            border-top: 1px solid transparent;
            border-right: 1px solid transparent;
            border-left: 1px solid transparent;
        }
    </style>
</head>
<body>
    <table class="table">
        <tr>
            <td>
                <table class="table">
                    <tr>
                        <td>Soni Interiors LLC</td>
                    </tr>
                    <tr>
                        <td>Fax: 407-323-0701</td>
                    </tr>
                    <tr>
                        <td>Phone: 407-323-5444</td>
                    </tr>
                    <tr>
                        <td>201 Hickman Dr.</td>
                    </tr>
                    <tr>
                        <td>Sanford, FL 32771</td>
                    </tr>
                </table>
            </td>
            <td align="right" valign="top" width="175px;">
                <table style="text-align: center;" class="top-right-table">
                    <tr>
                        <td colspan="2"><h2>Receipt</h2></td>
                    </tr>
                    <tr>
                        <td><strong>Date</strong></td>
                        <td><strong>Receipt #</strong></td>
                    </tr>
                    <tr>
                        <td>{{ date('m/d/Y', strtotime($order->created_at)) }}</td>
                        <td>{{ $order->order_number }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="padding: 30px 0;">
        <table class="table table-bordered">
            <tr>
                <td><strong>Order Number</strong></td>
                <td>{{ $order->order_number }}</td>
            </tr>
            <tr>
                <td><strong>Costumer Name</strong></td>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <td><strong>Pulled By</strong></td>
                <td>{{ $order->pulled_by }}</td>
            </tr>
            <tr>
                <td><strong>Date Written</strong></td>
                <td>{{ $order->date_written ? date('m/d/Y', strtotime($order->date_written)) : '' }}</td>
            </tr>
            <tr>
                <td><strong>Origin</strong></td>
                <td>{{ $order->origination_id }}</td>
            </tr>
            <tr>
                <td><strong>Date Picked Up</strong></td>
                <td>{{ $order->date_picked_up ? date('m/d/Y', strtotime($order->date_picked_up)) : '' }}</td>
            </tr>
            <tr>
                <td><strong>Status</strong></td>
                <td>
                    @if($order->status == Config::get('constants.status.active'))
                        Active
                    @elseif($order->status == Config::get('constants.status.inactive'))
                        Inactive
                    @elseif($order->status == Config::get('constants.status.completed'))
                        Completed
                    @endif
                </td>
            </tr>
            <tr>
                <td><strong>Order Picked Up</strong></td>
                <td>{{ $order->order_picked_up_at }}</td>
            </tr>
            <tr>
                <td><strong>Partial Order</strong></td>
                <td>{{ $order->is_partial_order ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td><strong>Shipped By</strong></td>
                <td>{{ $order->shipped_by }}</td>
            </tr>
            <tr>
                <td><strong>Checked By</strong></td>
                <td>{{ $order->checked_by }}</td>
            </tr>
            <tr>
                <td><strong>Notes</strong></td>
                <td>{{ $order->notes }}</td>
            </tr>
        </table>
    </table>
</body>
</html>