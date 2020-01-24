<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant[]|\Cake\Collection\CollectionInterface $plants
 */
?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                        <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <a class="navbar-brand" href="#pablo">Plants</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <div class="form-inline">
                    <?= $this->Html->link(__('<i class="fas fa-plus"></i> New Plant'), ['action' => 'add'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!--<a class="nav-link" href="#pablo">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </a>-->

                    </li>
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">notifications</i>
                            <span class="notification">5</span>
                            <p class="d-lg-none d-md-block">
                                Some Actions
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Mike John responded to your email</a>
                            <a class="dropdown-item" href="#">You have 5 new tasks</a>
                            <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                            <a class="dropdown-item" href="#">Another Notification</a>
                            <a class="dropdown-item" href="#">Another One</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log out</a>
                        </div>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Simple Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Job Position</th>
                                    <th>Since</th>
                                    <th class="text-right">Salary</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Andrew Mike</td>
                                    <td>Develop</td>
                                    <td>2013</td>
                                    <td class="text-right">&euro; 99,225</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">person</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>2012</td>
                                    <td class="text-right">&euro; 89,241</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                            <i class="material-icons">person</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>2010</td>
                                    <td class="text-right">&euro; 92,144</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info btn-link">
                                            <i class="material-icons">person</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success btn-link">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-link">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>2013</td>
                                    <td class="text-right">&euro; 49,990</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                            <i class="material-icons">person</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>2015</td>
                                    <td class="text-right">&euro; 69,201</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">person</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Striped Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Type</th>
                                    <th>Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Moleskine Agenda</td>
                                    <td>Office</td>
                                    <td>25</td>
                                    <td class="text-right">&euro; 49</td>
                                    <td class="text-right">&euro; 1,225</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Stabilo Pen</td>
                                    <td>Office</td>
                                    <td>30</td>
                                    <td class="text-right">&euro; 10</td>
                                    <td class="text-right">&euro; 300</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>A4 Paper Pack</td>
                                    <td>Office</td>
                                    <td>50</td>
                                    <td class="text-right">&euro; 10.99</td>
                                    <td class="text-right">&euro; 109</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Apple iPad</td>
                                    <td>Meeting</td>
                                    <td>10</td>
                                    <td class="text-right">&euro; 499.00</td>
                                    <td class="text-right">&euro; 4,990</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Apple iPhone</td>
                                    <td>Communication</td>
                                    <td>10</td>
                                    <td class="text-right">&euro; 599.00</td>
                                    <td class="text-right">&euro; 5,999</td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="td-total">
                                        Total
                                    </td>
                                    <td class="td-price">
                                        <small>&euro;</small>12,999
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Shopping Cart Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-shopping">
                                <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th>Product</th>
                                    <th class="th-description">Color</th>
                                    <th class="th-description">Size</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Qty</th>
                                    <th class="text-right">Amount</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <img src="../../assets/img/product1.jpg" alt="...">
                                        </div>
                                    </td>
                                    <td class="td-name">
                                        <a href="#jacket">Spring Jacket</a>
                                        <br />
                                        <small>by Dolce&Gabbana</small>
                                    </td>
                                    <td>
                                        Red
                                    </td>
                                    <td>
                                        M
                                    </td>
                                    <td class="td-number text-right">
                                        <small>&euro;</small>549
                                    </td>
                                    <td class="td-number">
                                        1
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                                            <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                                        </div>
                                    </td>
                                    <td class="td-number">
                                        <small>&euro;</small>549
                                    </td>
                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-link">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <img src="../../assets/img/product2.jpg" alt="..." />
                                        </div>
                                    </td>
                                    <td class="td-name">
                                        <a href="#pants">Short Pants</a>
                                        <br />
                                        <small>by Pucci</small>
                                    </td>
                                    <td>
                                        Purple
                                    </td>
                                    <td>
                                        M
                                    </td>
                                    <td class="td-number">
                                        <small>&euro;</small>499
                                    </td>
                                    <td class="td-number">
                                        2
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                                            <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                                        </div>
                                    </td>
                                    <td class="td-number">
                                        <small>&euro;</small>998
                                    </td>
                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-link">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <img src="../../assets/img/product3.jpg" alt="...">
                                        </div>
                                    </td>
                                    <td class="td-name">
                                        <a href="#nothing">Pencil Skirt</a>
                                        <br />
                                        <small>by Valentino</small>
                                    </td>
                                    <td>
                                        White
                                    </td>
                                    <td>
                                        XL
                                    </td>
                                    <td class="td-number">
                                        <small>&euro;</small>799
                                    </td>
                                    <td class="td-number">
                                        1
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                                            <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                                        </div>
                                    </td>
                                    <td class="td-number">
                                        <small>&euro;</small>799
                                    </td>
                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-link">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="td-total">
                                        Total
                                    </td>
                                    <td colspan="1" class="td-price">
                                        <small>&euro;</small>2,346
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                    <td colspan="2" class="text-right">
                                        <button type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
