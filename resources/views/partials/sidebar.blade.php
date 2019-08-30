<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">
              <i class="menu-icon fa fa-book"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customerservice" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-user"></i>
              <span class="menu-title">Customer Service</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customerservice">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="./customerservice.php">Service New</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">In Kitchen</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-compass"></i>
              <span class="menu-title">Menu Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createcategory') }}">Add Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('categorylist') }}">Category List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('categoryarc') }}">Category Archive</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Menu" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-gear"></i>
              <span class="menu-title">Food Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createmenu') }}">Add Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('menulist') }}">Menu List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('menuarc') }}">Menu Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Barcode" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-barcode"></i>
              <span class="menu-title">Barcode</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Barcode">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createbarcode') }}">Add Barcode</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('barcodelist') }}">Barcode List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('barcodearc') }}">Barcode Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Customer" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-user-secret"></i>
              <span class="menu-title">Customer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Customer">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createcustomer') }}">Add Customer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('customerlist') }}">Customer List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('customerarc') }}">Customer Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Manager" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-user-plus"></i>
              <span class="menu-title">Manager</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Manager">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="./manageradd.php">Add Manager</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./managerlist.php">Manager List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./managerlistarc.php">Manager Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Staff" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-user-o"></i>
              <span class="menu-title">Staff</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Staff">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createstaff') }}">Add Staff</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('stafflist') }}">Staff List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('staffarc') }}">Staff Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Banking" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-bank"></i>
              <span class="menu-title">Banking</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Banking">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createbanking') }}">New Transaction</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('bankinglist') }}">Transaction List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('bankingarc') }}">Transaction Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#fixedcosts" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-money"></i>
              <span class="menu-title">Fixed Costs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fixedcosts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createfixedcosts') }}">Add Costing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('fixedcostslist') }}">Fixed Expense Reason</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('fixedcostsarc') }}">Fixed Expense Archive</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('fixedcostsexpenseslist') }}">Expense List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('fixedcostsexpensesarc') }}">Expense Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dailyexpenses" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-viacoin"></i>
              <span class="menu-title">Daily Expenses</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dailyexpenses">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createdailyexpensescategory') }}">Add Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dailyexpensescategorylist') }}">Category List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dailyexpensescategoryarc') }}">Category Archive</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('createdailyexpenses') }}">Expense Now</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dailyexpenseslist') }}">Expense List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dailyexpensesarc') }}">Expense Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reservation" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-bookmark"></i>
              <span class="menu-title">Reservation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reservation">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="./">Reserve Now</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Reserve List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Reservation Served</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Reservation Archive</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Accounts" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-wpforms"></i>
              <span class="menu-title">Accounts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Accounts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="./">Customer Invoices</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Reservation Invoices</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Staffs Salary Invoices</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Daily Expenses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Fixed Costs</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon fa fa-gitlab"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-optin-monster"></i>
              <span class="menu-title">App Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="./">App Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">Service Type</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./">VAT</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon fa fa-object-group"></i>
              <span class="menu-title">Profile & Settings</span>
            </a>
          </li>
        </ul>
      </nav>
