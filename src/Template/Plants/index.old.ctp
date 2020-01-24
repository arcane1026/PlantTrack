<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant[]|\Cake\Collection\CollectionInterface $plants
 */
?>

<nav id="page-navbar" class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div>
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="far fa-ellipsis-v visible-on-sidebar-regular"></i>
                    <i class="far fa-bars visible-on-sidebar-mini"></i>
                </button>
            </div>
            <a class="navbar-brand"><?= __('Plants') ?></a>
        </div>
        <div class="form-inline">
            <?= $this->Html->link(__('<i class="fas fa-plus"></i> New Plant'), ['action' => 'add'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
        </div>
    </div>
</nav>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-leaf"></i> <?= __('All Plants') ?>
                    </h4>

                    <div class="card-content">
                        <h4 class="card-title">&nbsp;</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <!--<th class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Job Position</th>
                                    <th>Since</th>
                                    <th class="text-right">Salary</th>
                                    <th class="text-right">Actions</th>-->
                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('resource_path') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('user_id', 'Created By') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created', 'Created On') ?></th>
                                    <th class="text-right" scope="col"><?= __('Actions') ?></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php foreach ($plants as $plant): ?>
                                    <tr>
                                        <td><?= $this->Html->link(h($plant->name), ['action' => 'view', $plant->id]) ?></td>
                                        <td><?= h($plant->description) ?></td>
                                        <td><?= h($plant->resource_path) ?></td>
                                        <td><?= $plant->has('user') ? $this->Html->link($plant->user->username, ['controller' => 'Users', 'action' => 'view', $plant->user->id]) : '' ?></td>
                                        <td><?= h($plant->created) ?></td>
                                        <td class="td-actions text-right">
                                            <?= $this->Html->link(__('<i class="fas fa-fw fa-pencil-alt"></i>'), ['action' => 'edit', $plant->id], ['escape' => false, 'class' => 'btn btn-info']) ?>
                                            <?= $this->Form->postLink(__('<i class="fas fa-fw fa-trash"></i>'), ['action' => 'delete', $plant->id], ['escape' => false, 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete the plant named: {0}?', $plant->name)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <!--
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Andrew Mike</td>
                                    <td>Develop</td>
                                    <td>2013</td>
                                    <td class="text-right">€ 99,225</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="fas fa-fw fa-user"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="text-center">2</td>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>2012</td>
                                    <td class="text-right">€ 89,241</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="fas fa-fw fa-user"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>2010</td>
                                    <td class="text-right">€ 92,144</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="fas fa-fw fa-user"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>2013</td>
                                    <td class="text-right">€ 49,990</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="fas fa-fw fa-user"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>2015</td>
                                    <td class="text-right">€ 69,201</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="fas fa-fw fa-user"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                            <i class="fas fa-fw fa-times"></i>
                                        </button>
                                    </td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>

            <div class="card-content">
                <h4 class="card-title">Striped Table</h4>
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
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Moleskine Agenda</td>
                            <td>Office</td>
                            <td>25</td>
                            <td class="text-right">€ 49</td>
                            <td class="text-right">€ 1,225</td>
                        </tr>
                        <tr>

                            <td class="text-center">2</td>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Stabilo Pen</td>
                            <td>Office</td>
                            <td>30</td>
                            <td class="text-right">€ 10</td>
                            <td class="text-right">€ 300</td>
                        </tr>
                        <tr>

                            <td class="text-center">3</td>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>A4 Paper Pack</td>
                            <td>Office</td>
                            <td>50</td>
                            <td class="text-right">€ 10.99</td>
                            <td class="text-right">€ 109</td>
                        </tr>
                        <tr>

                            <td class="text-center">4</td>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Apple iPad</td>
                            <td>Meeting</td>
                            <td>10</td>
                            <td class="text-right">€ 499.00</td>
                            <td class="text-right">€ 4,990</td>
                        </tr>
                        <tr>

                            <td class="text-center">5</td>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Apple iPhone</td>
                            <td>Communication</td>
                            <td>10</td>
                            <td class="text-right">€ 599.00</td>
                            <td class="text-right">€ 5,999</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="td-total">
                                Total
                            </td>
                            <td class="td-price">
                                <small>€</small>12,999
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
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>

            <div class="card-content">
                <h4 class="card-title">Shopping Cart Table</h4>
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
                                <br><small>by Dolce&amp;Gabbana</small>
                            </td>
                            <td>
                                Red
                            </td>
                            <td>
                                M
                            </td>
                            <td class="td-number text-right">
                                <small>€</small>549
                            </td>
                            <td class="td-number">
                                1
                                <div class="btn-group">
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                </div>
                            </td>
                            <td class="td-number">
                                <small>€</small>549
                            </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-simple" data-original-title="Remove item">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="img-container">
                                    <img src="../../assets/img/product2.jpg" alt="...">
                                </div>
                            </td>
                            <td class="td-name">
                                <a href="#pants">Short Pants</a>
                                <br><small>by Pucci</small>
                            </td>
                            <td>
                                Purple
                            </td>
                            <td>
                                M
                            </td>

                            <td class="td-number">
                                <small>€</small>499
                            </td>
                            <td class="td-number">
                                2
                                <div class="btn-group">
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                </div>
                            </td>
                            <td class="td-number">
                                <small>€</small>998
                            </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-simple" data-original-title="Remove item">
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
                                <br><small>by Valentino</small>
                            </td>
                            <td>
                                White
                            </td>
                            <td>
                                XL
                            </td>

                            <td class="td-number">
                                <small>€</small>799
                            </td>
                            <td class="td-number">
                                1
                                <div class="btn-group">
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                </div>
                            </td>
                            <td class="td-number">
                                <small>€</small>799
                            </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-simple" data-original-title="Remove item">
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
                                <small>€</small>2,346
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
</div> -->






<!--
<div class="plants index large-9 medium-8 columns content">
    <h3><?= __('Plants') ?></h3>
    <div><?= $this->Html->link(__('New Plant'), ['action' => 'add'], ['class' => 'button']) ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resource_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plants as $plant): ?>
            <tr>
                <td><?= $this->Number->format($plant->id) ?></td>
                <td><?= $plant->has('user') ? $this->Html->link($plant->user->id, ['controller' => 'Users', 'action' => 'view', $plant->user->id]) : '' ?></td>
                <td><?= h($plant->name) ?></td>
                <td><?= h($plant->description) ?></td>
                <td><?= h($plant->resource_path) ?></td>
                <td><?= h($plant->created) ?></td>
                <td><?= h($plant->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $plant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $plant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $plant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plant->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
-->
