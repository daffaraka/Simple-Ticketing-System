@extends('admin.layout.layout-main')
<title>Orders</title>
@section('content')
<div class="container py-1">
    <a href="{{route('order.export')}}" class="btn btn-dark ms-0"><i class="fa fa-print"></i>  Export Excel</a>
    <div class="row mb-2 justify-content-center">
        <div class="col-lg-12 col-md-6 p-2">
           <table id="data-table-list" class="table table-dark table-striped text-start shadow">
               <thead>
                   <tr>
                       <th class="px-2">#</th>
                       <th class="px-2">Guest Name</th>
                       <th class="px-2">Qty </th>
                       <th class="px-2">Ticket </th>
                       <th class="px-2">Total </th>
                       <th class="px-2">Proof of Payment</th>
                       <th class="px-2">Status</th>
                       <th class="px-2">Action</th>
                   </tr>
               </thead>
               <tbody class="table-dark">
                  
               
                  
               </tbody>
           </table>
        </div>
    </div>
</div>
  
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $(document).ready(function() {
            var i = 1;
            $('#data-table-list').DataTable({
                processing: true,
                serverSide: true,
                
                ajax: {
                    url: "{{ route('eo.order.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id_pemesanan',
                        name: 'id_pemesanan' 
                    },
                    {
                        data: 'nama_pengunjung',
                        name: 'nama_pengunjung',
                    },
                    {
                        data: 'jumlah_ticket',
                        name: 'jumlah_ticket'
                    },
                    {
                        data: 'ticket.ticket_name',
                        name: 'ticket.ticket_name'
                    },
                    {
                        data: 'total',
                        name: 'total',
                        render: $.fn.dataTable.render.number( ',', '.','', 'Rp.' )
                    },
                    {
                        data: 'bukti_pembayaran',
                        render: function(data) {
                            if ( data == null ) {
                                return 'Empty';
                            } else {
                                return '<img src="{{ asset('bukti_pembayaran') }}/' + data +
                                '" class="img-thumbnail" class="m-3 mx-auto d-block" style="height:200px" />';
                            }
                            
                        },
                       
                    },
                    {
                        data: 'status',
                        render: function(data) {
                            if ( data == 'PENDING' ) {
                                return 'PENDING';
                            } else if ( data == 'BERHASIL') {
                                return 'BERHASIL';
                            } else {
                                return '';
                            }
                            
                        }, 
                      
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }


                ]
            });
        });
    </script>
@endpush