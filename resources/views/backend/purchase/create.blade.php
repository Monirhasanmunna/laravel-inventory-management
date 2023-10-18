@extends('app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
    integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    td {
        font-size: 16px;
        font-weight: 500;
    }

</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create Purchase</h2>

                <div class="text-right">
                    <a href="{{route('purchase.index')}}" class="btn btn-secondary"><i
                            class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form id="" action="{{route('purchase.store')}}" method="Post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="supplier">Supplier *:</label>
                            <select id="supplier_id" class="form-control js-example-basic-single">
                                @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="product">Select Product *:</label>
                            <select id="product_id" class="form-control js-example-basic-single">
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- product table start --}}

                        <div class="col-12 mt-5 d-none" id="productRow">
                            <div class="subtotal-wrapper px-3">
                                <table class="table table-striped jambo_table bulk_action table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Purchase Price</th>
                                            {{-- <th scope="col">Unit Cost</th> --}}
                                            <th scope="col">Tax</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="t-body">
                                        {{-- data from ajax --}}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan='6' class='text-right' style="font-weight:bold;color:gray">Total
                                                = </td>
                                            <td colspan='2' id='totalAmmount'></td>
                                            <input type="hidden" id='total' name='total[]'>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>

                        {{-- product table end --}}

                        <div class="col-3 mt-3">
                            <label for="po_reference">PO Referencde * :</label>
                            <input type="text" id="po_reference" class="form-control" name="po_reference"
                                class="@error('po_reference') is-invalid @enderror">
                            @error('po_reference')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-3 mt-3">
                            <label for="payment_terms">Payment Terms * :</label>
                            <input type="text" id="payment_terms" class="form-control" name="payment_terms"
                                class="@error('payment_terms') is-invalid @enderror">
                            @error('payment_terms')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-3 mt-3">
                            <label for="vat">Purchase Tax *:</label>
                            <select id="vat_id" class="form-control js-example-basic-single">
                                @foreach ($vats as $vat)
                                <option value="{{$vat->id}}">{{$vat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3 mt-3">
                            <label for="total_tax">Total Tax * :</label>
                            <input type="text" id="total_tax" readonly class="form-control" name="total_tax"
                                class="@error('total_tax') is-invalid @enderror">
                            @error('total_tax')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- add cost row start --}}

                        <div class="col-12 d-none px-2" id="costAddRow">
                            <div class="row">
                                <div class="col-3 mt-3">
                                    <label for="discount">Discount * :</label>
                                    <input type="number" id="discount" class="form-control" name="discount"
                                        class="@error('discount') is-invalid @enderror">
                                    @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="transport_cost">Transport Cost * :</label>
                                    <input type="number" id="transport_cost" class="form-control" name="transport_cost"
                                        class="@error('transport_cost') is-invalid @enderror">
                                    @error('transport_cost')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="net_total">Net Total * :</label>
                                    <input type="number" id="net_total" readonly class="form-control" name="net_total"
                                        class="@error('net_total') is-invalid @enderror">
                                    @error('net_total')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="payment">Add Payment? *:</label>
                                    <select id="payment" class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- add cost row end --}}

                        <div class="col-12 mt-3">
                            <label for="note">Note (100 chars max) :</label>
                            <textarea id="note" class="form-control form-control" name="note"
                                class="@error('note') is-invalid @enderror"></textarea>
                            @error('note')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4 mt-3">
                            <label for="purchase_date">Purchase Date * :</label>
                            <input type="date" id="purchase_date" class="form-control" value="{{date('Y-m-d')}}"
                                name="purchase_date" class="@error('purchase_date') is-invalid @enderror">
                            @error('purchase_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4 mt-3">
                            <label for="po_date">PO Date * :</label>
                            <input type="date" id="po_date" class="form-control" value="{{date('Y-m-d')}}"
                                name="po_date" class="@error('po_date') is-invalid @enderror">
                            @error('po_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-4 mt-3">
                            <label for="status">Status *:</label>
                            <select id="status" class="form-control form-control @error('status') is-invalid @enderror"
                                name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>


                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        $('.js-example-basic-single').select2();
    });

</script>


<script>
    $(document).ready(function () {
        let i = 0;
        $("#product_id").change(function () {
            let id = $(this).val();
            $.ajax({
                url: `/purchase/product_details/${id}`,
                type: 'GET',
                success: (data) => {
                    i = i + 1;
                    let html = `
                <tr>
                  <td>${i}</td>
                  <td width='10%'>${data.item_code}</td>
                  <td width='15%'>${data.name}</td>
                  <td><input type="number" class='form-control quantity' name='quantity[]'></td>
                  <td><input type="number" class='form-control purchase_price' name='purchase_price[]'></td>
                  <td width='10%'>${data.vat_rate}</td>
                  <td width='15%'><input type="number" readonly class='form-control subtotal' name='subtotal[]'></td>
                  <td><a href="javascript:void(0)" class="btn-sm btn-danger deleteBtn"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
          `


                    $('#t-body').append(html)
                    $("#productRow").removeClass('d-none');
                    $("#costAddRow").removeClass('d-none');
                }
            });
        });
    });


    $(document).on('keyup', '.quantity', function () {
        subtotalcalculation($(this));

    });

    $(document).on('change', '.quantity', function () {
        subtotalcalculation($(this));
    });

    $(document).on('keyup', '.purchase_price', function () {
        subtotalcalculation($(this));
    });

    $(document).on('change', '.purchase_price', function () {
        subtotalcalculation($(this));
    });


    function subtotalcalculation(input) {
        let row = input.closest('tr');
        let quantity = row.find('.quantity').val();
        let price = row.find('.purchase_price').val();

        let subtotal = parseInt(quantity) * parseInt(price);
        row.find('.subtotal').val(subtotal);
        totalCalculation();
    }


    let totalAmmount = 0;

    function totalCalculation() {
        let total = 0;

        if ($(".subtotal").length === 0) {
            totalAmmount = 0;
            $("#productRow").addClass('d-none');
            $("#costAddRow").addClass('d-none');
        }

        $(".subtotal").each(function () {
            let sub = parseInt($(this).val());

            if (!isNaN(sub)) {
                total += sub;
            }
            if (!isNaN(total)) {
                totalAmmount = total
            }
        })
        $("#totalAmmount").html(totalAmmount);
        $("#total").val(totalAmmount);
    }


    $(document).on('click', '.deleteBtn', function () {
        $(this).closest('tr').remove();
        totalCalculation()
    })

</script>

@endpush
