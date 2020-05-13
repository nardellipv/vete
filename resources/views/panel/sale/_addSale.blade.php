@extends('layouts.mainAdmin')

@section('breadcrumb', 'Agregar nueva Ventas')

@section('script')
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/bootstrap_select.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/form_bootstrap_select.js' )}}"></script>

    {{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function () {
            var counter = 1;

            $("#addrow").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><select name="stock_id[][' + counter  + ']"><option value="">Elija el Producto</option>@foreach($stocks as $stock)<option value="{{ $stock->id }}">{{ $stock->name }}</option>@endforeach</select></td>';
                cols += '<td><input type="text" class="form-control description" name="description[][' + counter + ']" step="0" min="0"/></td>';
                cols += '<td><input type="text" class="form-control description" name="qty[][' + counter + ']" step="0" min="0"/></td>';
                cols += '<td><input type="text" class="form-control description" name="price[][' + counter + ']" step="0" min="0"/></td>';
                cols += '<td><input type="text" class="form-control description" name="total[][' + counter + ']" step="0" min="0"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });



            $("table.order-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });


        });



        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function () {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }
    </script>
@endsection

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">

                @include('alerts._errors')

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Nueva Venta</h5>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-10 col-lg-offset-1" style="margin-bottom: 10px">
                            <button id="add_row" class="btn btn-default pull-left">Agregar Fila</button>
                            <button id='delete_row' class="pull-right btn btn-default">Borrar Fila</button>
                        </div>
                    </div>

                    <form method="post" action="{{ route('addNew.sale') }}">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-12">

                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="customer_id" data-live-search="true"
                                                data-width="100%">
                                            <option value="">Elija el Cliente</option>
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--<h4>Recibo # {{ $invoiceNumber->invoice }}</h4>--}}

                                <table id="myTable" class=" table order-list">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Producto</th>
                                        <th class="text-center"> Descripción</th>
                                        <th class="text-center"> Cantidad</th>
                                        <th class="text-center"> Precio</th>
                                        <th class="text-center"> Descuento</th>
                                        <th class="text-center"> Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <select name="stock_id[]">
                                                <option value="">Elija el Producto</option>
                                                @foreach($stocks as $stock)
                                                    <option value="{{ $stock->id }}">{{ $stock->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name='description[][0]'
                                                   class="form-control description" step="0" min="0"/></td>
                                        <td><input type="number" name='qty[][0]' required
                                                   class="form-control qty" step="0" min="0"/></td>
                                        <td><input type="number" name='price[][0]' required
                                                   class="form-control price" step="0.00" min="0"/></td>
                                        <td><input type="number" name='discount[][0]'
                                                   class="form-control discount"/></td>
                                        <td><input type="number" name='total[]' required
                                                   class="form-control total" readonly/></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: left;">
                                            <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:20px">
                            <div class="pull-right col-md-4">
                                <table class="table table-bordered table-hover" id="tab_logic_total"
                                       style="font-size: 12px;">
                                    <tbody>
                                    <tr>
                                        <th class="text-center">Sub Total</th>
                                        <td class="text-center"><input type="number" name='sub_total' placeholder='0.00'
                                                                       class="form-control" id="sub_total" readonly/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Impuesto</th>
                                        <td class="text-center">
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="number" class="form-control" name="tax" id="tax" placeholder="0">
                                                <div class="input-group-addon">%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Impuesto $</th>
                                        <td class="text-center"><input type="number" name='tax_amount' id="tax_amount"
                                                                       placeholder='0.00' class="form-control"
                                                                       readonly/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Total</th>
                                        <td class="text-center"><input type="number" name='total_amount'
                                                                       id="total_amount"
                                                                       placeholder='0.00' class="form-control"
                                                                       readonly/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary legitRipple" style="margin: 20px 43px 20px 35px;">
                            Generar Recibo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection