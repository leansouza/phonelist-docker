<div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">List Contacts</h1>
                    <p class="mb-4">View your agenda without missing a single piece of information </p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Contacts</h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Country</label>
                                    <select id="countryFilter" class="custom-select custom-select-lg mb-3">
                                        <option value="">Show All</option>
                                        <?php foreach($countries as $country):?>
                                            <option value="<?php echo $country[0]?>"><?php echo $country[0]?></option>
                                        <?php endforeach;?>
                                      </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Status</label>
                                    <select id="statusFilter" class="custom-select custom-select-lg mb-3">
                                        <option value="">Show All</option>
                                        <option value="Invalid">INVALID</option>
                                        <option value="Valid">VALID</option>
                                      </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Country</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php if($contacts)foreach($contacts as $contato) : ?>
                                            <tr>
                                                <th scope="col"><?php echo $contato['country'] ?></th>
                                                <th scope="col"><?php echo $contato['name'] ?></th>
                                                <th scope="col"><?php echo $contato['phone'] ?></th>
                                                <th scope="col"><?php echo $contato['status'] == 1? 'Valid':'Invalid' ?></th>
                                            </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>