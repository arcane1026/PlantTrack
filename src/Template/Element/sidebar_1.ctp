<?php
?>
<div class="user">
    <div class="photo" style="border-radius: 0px;">
        <!--<img src="../assets/img/faces/avatar.jpg" />-->
        <i class="fas fa-building" style="font-size: 24px; color: #eee; border-radius: 0px;"></i>
    </div>
    <div class="user-info">
        <a data-toggle="collapse" href="#businessCollapse" class="username">
              <span>
                <?= $activeUser['business_name'] ?? 'NO BUSINESS' ?>
                <b class="caret"></b>
              </span>
        </a>
        <div class="collapse" id="businessCollapse">
            <ul class="nav">
                <li class="nav-item">
                    <?= $this->Html->link(__('<span class="sidebar-mini"> <i class="fal fa-fw fa-user"></i> </span><span class="sidebar-normal"> My Profile </span>'), ['controller' => 'Users', 'action' => 'view_profile'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('<span class="sidebar-mini"> <i class="fal fa-fw fa-user-edit"></i> </span><span class="sidebar-normal"> Edit Profile </span>'), ['controller' => 'Users', 'action' => 'edit_profile'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('<span class="sidebar-mini"> <i class="fal fa-fw fa-user-cog"></i> </span><span class="sidebar-normal"> User Settings </span>'), ['controller' => 'Users', 'action' => 'user_settings'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<ul class="nav">
    <li class="nav-item active ">
        <?= $this->Html->link(__('<i class="material-icons">dashboard</i> <p> Dashboard </p>'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
            <i class="material-icons">image</i>
            <p> Pages
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="pagesExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/pricing.html">
                        <span class="sidebar-mini"> P </span>
                        <span class="sidebar-normal"> Pricing </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/rtl.html">
                        <span class="sidebar-mini"> RS </span>
                        <span class="sidebar-normal"> RTL Support </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/timeline.html">
                        <span class="sidebar-mini"> T </span>
                        <span class="sidebar-normal"> Timeline </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/login.html">
                        <span class="sidebar-mini"> LP </span>
                        <span class="sidebar-normal"> Login Page </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/register.html">
                        <span class="sidebar-mini"> RP </span>
                        <span class="sidebar-normal"> Register Page </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/lock.html">
                        <span class="sidebar-mini"> LSP </span>
                        <span class="sidebar-normal"> Lock Screen Page </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/user.html">
                        <span class="sidebar-mini"> UP </span>
                        <span class="sidebar-normal"> User Profile </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/error.html">
                        <span class="sidebar-mini"> E </span>
                        <span class="sidebar-normal"> Error Page </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
            <i class="material-icons">apps</i>
            <p> Components
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="componentsExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                        <span class="sidebar-mini"> MLT </span>
                        <span class="sidebar-normal"> Multi Level Collapse
                      <b class="caret"></b>
                    </span>
                    </a>
                    <div class="collapse" id="componentsCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#0">
                                    <span class="sidebar-mini"> E </span>
                                    <span class="sidebar-normal"> Example </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/components/buttons.html">
                        <span class="sidebar-mini"> B </span>
                        <span class="sidebar-normal"> Buttons </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/components/grid.html">
                        <span class="sidebar-mini"> GS </span>
                        <span class="sidebar-normal"> Grid System </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/components/panels.html">
                        <span class="sidebar-mini"> P </span>
                        <span class="sidebar-normal"> Panels </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/components/sweet-alert.html">
                        <span class="sidebar-mini"> SA </span>
                        <span class="sidebar-normal"> Sweet Alert </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/components/notifications.html">
                        <span class="sidebar-mini"> N </span>
                        <span class="sidebar-normal"> Notifications </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/components/icons.html">
                        <span class="sidebar-mini"> I </span>
                        <span class="sidebar-normal"> Icons </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/components/typography.html">
                        <span class="sidebar-mini"> T </span>
                        <span class="sidebar-normal"> Typography </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#formsExamples">
            <i class="material-icons">content_paste</i>
            <p> Forms
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="formsExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/forms/regular.html">
                        <span class="sidebar-mini"> RF </span>
                        <span class="sidebar-normal"> Regular Forms </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/forms/extended.html">
                        <span class="sidebar-mini"> EF </span>
                        <span class="sidebar-normal"> Extended Forms </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/forms/validation.html">
                        <span class="sidebar-mini"> VF </span>
                        <span class="sidebar-normal"> Validation Forms </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/forms/wizard.html">
                        <span class="sidebar-mini"> W </span>
                        <span class="sidebar-normal"> Wizard </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
            <i class="material-icons">grid_on</i>
            <p> Tables
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="tablesExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/tables/regular.html">
                        <span class="sidebar-mini"> RT </span>
                        <span class="sidebar-normal"> Regular Tables </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/tables/extended.html">
                        <span class="sidebar-mini"> ET </span>
                        <span class="sidebar-normal"> Extended Tables </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/tables/datatables.net.html">
                        <span class="sidebar-mini"> DT </span>
                        <span class="sidebar-normal"> DataTables.net </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
            <i class="material-icons">place</i>
            <p> Maps
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="mapsExamples">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/maps/google.html">
                        <span class="sidebar-mini"> GM </span>
                        <span class="sidebar-normal"> Google Maps </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/maps/fullscreen.html">
                        <span class="sidebar-mini"> FSM </span>
                        <span class="sidebar-normal"> Full Screen Map </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../examples/maps/vector.html">
                        <span class="sidebar-mini"> VM </span>
                        <span class="sidebar-normal"> Vector Map </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="../examples/widgets.html">
            <i class="material-icons">widgets</i>
            <p> Widgets </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="../examples/charts.html">
            <i class="material-icons">timeline</i>
            <p> Charts </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="../examples/calendar.html">
            <i class="material-icons">date_range</i>
            <p> Calendar </p>
        </a>
    </li>
</ul>
