@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 col-sm-5">
            <!-- <h5 class="text-center">Menu</h5> -->
            <!-- Restaurnet Logo -->
            <div class="row">
                           
                           <div class="col-md-12">
                               <th class="align-middle">
                                   <h6>Menu Items</h6>
                               </th>
                           </div>
                       </div>
            <!-- Menu foreach  -->
            <table class="table table-striped table-hover">
              
                <tbody>
                <div>
                    <div class="row">
                        <div class="col-md-4"><td>
                            <!-- <a href="#" data-toggle="modal"><button type="button" value="delete" class="btn btn-success" data-target="#forModal"> </button></a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Chicken burger
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">All Chicken Burger</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Sub-Menu for each  -->
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>

                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"><button type="button" class="btn btn-primary"
                                                                style="width:100%"> Cheese Chicken burger (200 tk)
                                                            </button></td>


                                                    </tr>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-primary"
                                                                style="width:100%"> BBQ Chicken burger (250 tk)
                                                            </button></td>
                                                    </tr>
                                                     <tr>
                                                        <td><button type="button" class="btn btn-primary"
                                                                style="width:100%"> BBQ Chicken burger (250 tk)
                                                            </button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td></div>
                        <div class="col-md-4"><td>
                            <!-- <a href="#" data-toggle="modal"><button type="button" value="delete" class="btn btn-success" data-target="#forModal"> </button></a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Chicken burger
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">All Chicken Burger</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Sub-Menu for each  -->
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>

                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"><button type="button" class="btn btn-primary"
                                                                style="width:100%"> Cheese Chicken burger (200 tk)
                                                            </button></td>


                                                    </tr>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-primary"
                                                                style="width:100%"> BBQ Chicken burger (250 tk)
                                                            </button></td>
                                                    </tr>
                                                     <tr>
                                                        <td><button type="button" class="btn btn-primary"
                                                                style="width:100%"> BBQ Chicken burger (250 tk)
                                                            </button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td></div>
                        <div class="col-md-4">
                        <td>
                            <!-- <a href="#" data-toggle="modal"><button type="button" value="delete" class="btn btn-success" data-target="#forModal"> </button></a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Chicken burger
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">All Chicken Burger</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Sub-Menu for each  -->
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>

                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"><button type="button" class="btn btn-primary"
                                                                style="width:100%"> Cheese Chicken burger (200 tk)
                                                            </button></td>


                                                    </tr>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-primary"
                                                                style="width:100%"> BBQ Chicken burger (250 tk)
                                                            </button></td>
                                                    </tr>
                                                     <tr>
                                                        <td><button type="button" class="btn btn-primary"
                                                                style="width:100%"> BBQ Chicken burger (250 tk)
                                                            </button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        </div>
                    </div>
                </div>
                    <tr>
                        
                        
                    </tr>

                </tbody>

            </table>
        </div>



        <div class="col-md-4 col-sm-4">
            <h5 class="text-center">Receipt Area</h5>
            <ol class="list-group text-center">
                <li class="list-group-item list-group-item-success">
                    Item Name

                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <button class="btn btn-success" style="padding: .375rem .75rem"><i style="margin: 0px"
                                    class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <button class="btn btn-secondary" style="padding: .375rem .75rem"><i style="margin: 0px"
                                    class="fa fa-minus"></i></button>

                        </div>
                        <div class="col-md-2 col-sm-2">
                            <button class="btn btn-danger" style="padding: .375rem .75rem"><i style="margin: 0px"
                                    class="fa fa-times"></i></button>

                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button class="btn btn-light"
                                style="padding: .375rem .75rem"><span>100x200=40000</span></button>
                        </div>

                    </div>
                </li>
            </ol>
            <br>
            <div class="text-center">
                <button class="btn btn-success">Confirm</button>
            </div>


        </div>
    </div>
</div>

@endsection
