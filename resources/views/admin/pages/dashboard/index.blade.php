@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="d-flex  col-12 my-3 gx-5 overflow-auto">

            <!-- small box -->
            <div class="small-box bg-info col m-2">
                <div class="inner">
                    <h3>{{ $categories_count }}</h3>
                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
            <!-- ./col -->





            {{-- 'chats','careers','contact_us','construction_updates','news' --}}




            <div class="small-box bg-success col m-2">
                <div class="inner">
                    <h3>{{ $products }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>


            <div class="small-box bg-danger col m-2">
                <div class="inner">
                    <h3>{{ $news }}</h3>
                    <p>News </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>


            <!-- small box -->
            <div class="small-box bg-primary col m-2">
                <div class="inner">
                    <h3>{{ $contact_us }}</h3>
                    <p>Contact Us Messages</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>


            {{--       <div class="small-box bg-warning"> --}}
            {{--        <div class="inner"> --}}
            {{--           <h3>{{$construction_updates}}</h3> --}}
            {{--          <p>Construction Updates</p> --}}
            {{--         </div> --}}
            {{--         <div class="icon"> --}}
            {{--            <i class="ion ion-pie-graph"></i> --}}
            {{--        </div> --}}
            {{--     </div> --}}

            {{-- <div class="small-box bg-info">
               <div class="inner">

                  <p>New leads</p>
                </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div> --}}

        </div>
        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        visitors
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <canvas id="myChart" width="400"></canvas>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- TO DO List -->

            <!-- /.card -->
        </section>



    </div>
    <!-- ./col -->

    </div>

    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Note</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('note.store') }}" method="POST">
                        @csrf
                        <label for="inputName" class="col-sm-6 col-form-label">Add Your note</label>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name="note"
                                    placeholder="your note ...">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('page_level_js')
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script>
        $(".delete").click(function() {
            var id = $(this).parents("li").attr("id");
            $.ajax({
                url: '{{ url('/dashboard/note/') }}' + '/' + id,
                type: 'Delete',
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    console.log("#delete" + id);
                    $("#" + id).remove();
                }
            });

        });
    </script>
    <script type="text/javascript">
        $(".done").click(function() {
            console.log("asdfsD");
            var value = $(this).val();
            console.log(value);
            var id = $(this).parents("li").attr("id");
            console.log(id);
            $.ajax({
                url: '{{ url('/dashboard/note/done') }}' + '/' + id,
                type: 'put',
                data: {
                    done: value == 1 ? 0 : 1
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    document.getElementById("todoCheck" + id).value = value == 1 ? 0 : 1;
                }
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo '["' . implode('", "', $month_ago) . '"]'; ?>,
                datasets: [{
                    label: 'Visitor CHART',
                    data: <?php echo '["' . implode('", "', $visitorsBerMonth) . '"]'; ?>,
                    backgroundColor: [
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                        'rgba(101, 101, 172, 1)',
                        'rgba(143, 208, 193, 1)',
                    ],
                    borderColor: [
                        'rgba(101, 101, 172, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
