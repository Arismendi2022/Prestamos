<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Toto Admin</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="https://www.loandisk.com/favicon.ico" type="image/x-icon"/>
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="https://x.loandisk.com/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="https://x.loandisk.com/dist/css/skins/skin-blue.min.css">
	<link rel="stylesheet" href="https://x.loandisk.com/plugins/timepicker/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="https://x.loandisk.com/plugins/select2/select2_new.min.css">
	<link rel="stylesheet" href="https://x.loandisk.com/dist/css/AdminLTE.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="https://x.loandisk.com/css/style_new3.css">
	<script src="https://x.loandisk.com/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="https://x.loandisk.com/dist/js/jquery-confirm.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://x.loandisk.com/dist/css/jquery-confirm.min.css">
	<link rel="stylesheet" type="text/css" href="https://x.loandisk.com/css/jquery.datepick_v2.css">
	<script type="text/javascript" src="https://x.loandisk.com/include/js/jquery.plugin.js"></script>
	<script type="text/javascript" src="https://x.loandisk.com/include/js/jquery.datepick.min.js"></script>
	<script type="text/javascript" src="https://x.loandisk.com/include/js/jquery.numeric.js"></script>
	<link rel="stylesheet" type="text/css"
				href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/fh-3.1.7/r-2.2.5/sc-2.0.2/datatables.min.css"/>
	
	<script type="text/javascript"
					src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/fh-3.1.7/r-2.2.5/sc-2.0.2/datatables.min.js"></script>
	<style type="text/css">
    #progress {
      width: 500px;
      border: 1px solid #aaa;
      height: 20px;
    }

    #progress .bar {
      background-color: #ccc;
      height: 20px;
    }
	</style>
	<link rel="stylesheet" type="text/css" href="https://x.loandisk.com/css/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="https://x.loandisk.com/css/search_new.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="preload"></div>
<div class="wrapper">
	<!-- Main Header -->
	<header class="main-header">
		
		<!-- Logo -->
		<a href="https://x.loandisk.com/home/welcome.php" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Toto</b> Admin</span>
		</a>
		
		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			
			<div class="navbar-header">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					Left Menu
				</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars">Top Menu</i>
				</button>
			</div>
			<!-- Navbar Right Menu -->
			<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
				
				<!-- Top Menu -->
				<ul class="nav navbar-nav">
					
					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">2</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li>
										<a
											href="https://x.loandisk.com/loans/due_loans.php?search=1&start_date=01%2F01%2F2024&end_date=01%2F01%2F2024&delete_loans_due_tomorrow_notification=1">
											<i class="fa fa-info text-blue"></i> 1 loans are due tomorrow
										</a>
									</li>
									<li>
										<a href="https://x.loandisk.com/loans/due_loans.php?search=1&start_date=31%2F12%2F2023&end_date=31%2F12%2F2023&delete_loans_due_today_notification=1">
											<i class="fa fa-warning text-yellow"></i> 1 loans are due today
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="https://x.loandisk.com/admin/index.php"><i class="fa fa-ban"></i> <span>Admin</span></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-link"></i> <span>Settings</span> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="https://x.loandisk.com/billing/billing.php">Billing</a>
							</li>
							<li>
								<a href="https://x.loandisk.com/home/change_password.php">Change Password</a>
							</li>
							<li>
								<a href="https://x.loandisk.com/staff/two_factor_authentication/setup_two_factor_authentication.php">Two-Factor Authentication</a>
							</li>
							<li>
								<a href="https://x.loandisk.com/logout.php">Logout</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="https://x.loandisk.com/helpdesk_login.php" target="_blank"><i class="fa fa-support"></i> <span>Help</span></a>
					</li>
				</ul>
			</div>
		
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="https://x.loandisk.com/images/face_image_placeholder.png" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<h6>Arismendi Guiza</h6>
				</div>
			</div>
			<!-- Sidebar Menu -->
			<ul class="sidebar-menu">
				<li><a href="https://x.loandisk.com/admin/change_branch.php"><i class="fa fa-eye"></i><span>View Another Branch</span></a></li>
				<li style="border-top: 1px solid #000;"><a href="https://x.loandisk.com/home/home_branch.php"><i class="fa fa-circle-o text-aqua"></i> <span>Branch #1</span></a>
				</li>
				<li>
					<a href="https://x.loandisk.com/home/home_branch.php"><i class="fa fa-home"></i><span>Home Branch</span> </a>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-user"></i> <span>Borrowers</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/borrowers/view_borrowers_branch.php"><i class="fa fa-circle-o"></i>View Borrowers</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/borrowers/add_borrower.php"><i class="fa fa-circle-o"></i>Add Borrower</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/borrowers/groups/view_borrowers_groups_branch.php"><i class="fa fa-circle-o"></i>View Borrower Groups</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/borrowers/groups/add_borrowers_group.php"><i class="fa fa-circle-o"></i>Add Borrowers Group</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/send_messages/send_sms_to_all_borrowers.php"><i class="fa fa-circle-o"></i>Send SMS to All Borrowers</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/send_messages/send_email_to_all_borrowers.php"><i class="fa fa-circle-o"></i>Send Email to All Borrowers</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/borrowers/invite_borrowers.php"><i class="fa fa-circle-o"></i>Invite Borrowers</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-balance-scale"></i> <span>Loans</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/loans/view_loans_branch.php"><i class="fa fa-circle-o"></i>View All Loans</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/add_loan.php"><i class="fa fa-circle-o"></i>Add Loan</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/due_loans.php"><i class="fa fa-circle-o"></i>Due Loans</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/missed_repayments.php"><i class="fa fa-circle-o"></i>Missed Repayments</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/arrears_loans.php"><i class="fa fa-circle-o"></i>Loans in Arrears</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/no_repayment_loans.php"><i class="fa fa-circle-o"></i>No Repayments</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/view_loans_past_maturity_date_branch.php"><i class="fa fa-circle-o"></i>Past Maturity Date</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/principal_outstanding_loans.php"><i class="fa fa-circle-o"></i>Principal Outstanding</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/view_loans_late_1month_branch.php"><i class="fa fa-circle-o"></i>1 Month Late Loans</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/view_loans_late_3months_branch.php"><i class="fa fa-circle-o"></i>3 Months Late Loans</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/loan_calculator.php"><i class="fa fa-circle-o"></i>Loan Calculator</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/guarantors/view_guarantors_branch.php"><i class="fa fa-circle-o"></i>Guarantors</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/loan_comments/view_loans_comments.php"><i class="fa fa-circle-o"></i>Loan Comments</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/loans/approve_loans_branch.php"><i class="fa fa-circle-o"></i>Approve Loans</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-dollar"></i> <span>Repayments</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/repayments/view_repayments_branch.php"><i class="fa fa-circle-o"></i>View Repayments</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/repayments/add_bulk_repayments.php"><i class="fa fa-circle-o"></i>Add Bulk Repayments</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/repayments/add_bulk_repayments_csv.php"><i class="fa fa-circle-o"></i>Upload Repayments - CSV file</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/repayments/repayments_charts.php"><i class="fa fa-circle-o"></i>Repayments Charts</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/repayments/approve_repayments_branch.php"><i class="fa fa-circle-o"></i>Approve Repayments</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="https://x.loandisk.com/collateral/collateral_register.php"><i class="fa fa-list"></i><span>Collateral Register</span> </a>
				</li>
				<li>
					<a href="https://x.loandisk.com/calendar/view_calendar.php"><i class="fa fa-calendar"></i><span>Calendar</span> </a>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-file-text-o"></i> <span>Collection Sheets</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/collection_sheets/manage_daily_collection_sheet.php?view_daily_collection=1"><i class="fa fa-circle-o"></i>Daily Collection
								Sheet</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/collection_sheets/manage_daily_collection_sheet.php?view_missed_repayments_sheet=1"><i class="fa fa-circle-o"></i>Missed
								Repayment Sheet</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/collection_sheets/manage_daily_collection_sheet.php?view_past_maturity_date=1"><i class="fa fa-circle-o"></i>Past Maturity
								Date Loans</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/collection_sheets/send_sms.php"><i class="fa fa-circle-o"></i>Send SMS</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/collection_sheets/send_email.php"><i class="fa fa-circle-o"></i>Send Email</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-bank"></i> <span>Savings</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/savings/view_savings_branch.php"><i class="fa fa-circle-o"></i>View Savings Accounts</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings/add_savings_account_branch.php"><i class="fa fa-circle-o"></i>Add Savings Account</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings/savings_charts.php"><i class="fa fa-circle-o"></i>Savings Charts</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings/savings_report.php"><i class="fa fa-circle-o"></i>Savings Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings/savings_products_report.php"><i class="fa fa-circle-o"></i>Savings Products Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings/savings_fee_report.php"><i class="fa fa-circle-o"></i>Savings Fee Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings/cash_source/view_cash_sources.php"><i class="fa fa-circle-o"></i>Cash Safe Management</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-link"></i> <span>Savings Transactions</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/savings_transactions/view_savings_transactions_branch.php"><i class="fa fa-circle-o"></i>View Savings Transactions</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings_transactions/add_bulk_transactions.php"><i class="fa fa-circle-o"></i>Add Bulk Transactions</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings_transactions/add_bulk_transactions_csv.php"><i class="fa fa-circle-o"></i>Upload Transactions - CSV file</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings/savings_staff_report.php"><i class="fa fa-circle-o"></i>Staff Transactions Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/savings_transactions/approve_savings_transactions_branch.php"><i class="fa fa-circle-o"></i>Approve Transactions</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-user-plus"></i> <span>Investors</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/investors/view_investors_branch.php"><i class="fa fa-circle-o"></i>View Investors</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/investors/add_investor.php"><i class="fa fa-circle-o"></i>Add Investor</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/send_messages/send_sms_to_all_investors.php"><i class="fa fa-circle-o"></i>Send SMS to All Investors</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/send_messages/send_email_to_all_investors.php"><i class="fa fa-circle-o"></i>Send Email to All Investors</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/investors/invite_investors.php"><i class="fa fa-circle-o"></i>Invite Investors</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-briefcase"></i> <span>Investor Accounts</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/investors/accounts/view_investors_accounts_branch.php"><i class="fa fa-circle-o"></i>View All Investor Accounts</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/investors/accounts/add_investor_account.php"><i class="fa fa-circle-o"></i>Add Investor Account</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/investors/accounts/loans/view_investors_loans_branch.php"><i class="fa fa-circle-o"></i>View All Loan Investments</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/investors/transactions/view_transactions_branch.php"><i class="fa fa-circle-o"></i>View Investor Transactions</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/investors/accounts/approve_loan_investments.php"><i class="fa fa-circle-o"></i>Approve Loan Investments</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="https://x.loandisk.com/esignatures/view_esignatures_branch.php"><i class="fa fa-legal"></i><span>E-Signatures</span> </a>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-paypal"></i> <span>Payroll</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/payroll/view_payroll_branch.php"><i class="fa fa-circle-o"></i>View Payroll</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/payroll/select_staff.php"><i class="fa fa-circle-o"></i>Add Payroll</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/payroll/payroll_report.php"><i class="fa fa-circle-o"></i>Payroll Report</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-share"></i> <span>Expenses</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/expenses/view_expenses_branch.php"><i class="fa fa-circle-o"></i>View Expenses</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/expenses/add_expense.php"><i class="fa fa-circle-o"></i>Add Expense</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-plus"></i> <span>Other Income</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/other_income/view_other_income_branch.php"><i class="fa fa-circle-o"></i>View Other Income</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/other_income/add_other_income.php"><i class="fa fa-circle-o"></i>Add Other Income</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-suitcase"></i> <span>Asset Management</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/asset_management/view_asset_management_branch.php"><i class="fa fa-circle-o"></i>View Asset Management</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/asset_management/add_asset_management.php"><i class="fa fa-circle-o"></i>Add Asset Management</a>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-industry"></i> <span>Reports</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/reports/balance_due_report.php?report_type=borrowers"><i class="fa fa-circle-o"></i>Borrowers Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/balance_due_report.php?report_type=loans"><i class="fa fa-circle-o"></i>Loan Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/loan_arrears_aging_report.php"><i class="fa fa-circle-o"></i>Loan Arrears Aging Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/view_collections_report_branch.php"><i class="fa fa-circle-o"></i>Collections Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/collector_report.php"><i class="fa fa-circle-o"></i>Collector Report (Staff)</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/deferred_income.php"><i class="fa fa-circle-o"></i>Deferred Income</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/deferred_income_monthly.php"><i class="fa fa-circle-o"></i>Deferred Income Monthly</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/pro_rata_collections_monthly.php"><i class="fa fa-circle-o"></i>Pro-Rata Collections Monthly</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/disbursement_report.php"><i class="fa fa-circle-o"></i>Disbursement Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/fees_report.php"><i class="fa fa-circle-o"></i>Fees Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/balance_due_report.php?report_type=loan_officers"><i class="fa fa-circle-o"></i>Loan Officer Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/balance_due_report.php?report_type=loan_products"><i class="fa fa-circle-o"></i>Loan Products Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/mfrs_ratios.php"><i class="fa fa-circle-o"></i>MFRS Ratios</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/monthly_report.php"><i class="fa fa-circle-o"></i>Monthly Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/outstanding_report.php"><i class="fa fa-circle-o"></i>Outstanding Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/portfolio_at_risk.php"><i class="fa fa-circle-o"></i>Portfolio At Risk (PAR)</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/at_a_glance.php"><i class="fa fa-circle-o"></i>At a Glance Report</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/reports/all_entries.php"><i class="fa fa-circle-o"></i>All Entries</a>
						</li>
					</ul>
				</li>
				<li class="treeview active">
					<a href="#"><i class="fa fa-book"></i> <span>Accounting</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li>
							<a href="https://x.loandisk.com/accounting/view_cash_flow_branch.php"><i class="fa fa-circle-o"></i>Cash flow Accumulated</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/view_cash_flow_monthly_branch.php"><i class="fa fa-circle-o"></i>Cash Flow Monthly</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/view_profit_loss_branch.php"><i class="fa fa-circle-o"></i>Profit / Loss</a>
						</li>
						<li class="active">
							<a href="https://x.loandisk.com/accounting/balance_sheet.php"><i class="fa fa-circle-o"></i>Balance Sheet</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/trial_balance.php"><i class="fa fa-circle-o"></i>Trial Balance</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/dea/ledger/view_general_ledger_summary.php"><i class="fa fa-circle-o"></i>General Ledger Summary</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/dea/branch_capital/view_branch_capital.php"><i class="fa fa-circle-o"></i>Branch Equity</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/dea/reconcile/reconcile_entries.php"><i class="fa fa-circle-o"></i>Reconcile Entries</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/dea/chart_of_account/view_chart_of_accounts.php"><i class="fa fa-circle-o"></i>Chart of Accounts</a>
						</li>
						<li>
							<a href="https://x.loandisk.com/accounting/dea/journal/manual_journal/view_manual_journal.php"><i class="fa fa-circle-o"></i>Manual Journal</a>
						</li>
					</ul>
				</li>
			</ul>
		</section>
	</aside>
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="container-fluid searchBar">
			<form id="searchForm">
				<div class="input-group" style="width: 100%;">
					<div class="input-group-btn">
						<button
							type="button"
							class="btn btn-default dropdown-toggle"
							name="category"
							id="category"
							data-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
							value="Borrowers">
							Borrowers <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#" class="category">Borrowers</a></li>
							<li><a href="#" class="category">Loans</a></li>
							<li><a href="#" class="category">Savings</a></li>
							<li><a href="#" class="category">Investors</a></li>
						</ul>
					</div>
					<div class="input-group-btn">
						<button
							type="button"
							class="btn btn-default dropdown-toggle"
							name="search_options"
							id="search_options"
							data-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
							value="Branch #1">
							Branch #1 <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#" class="search_options">Branch #1</a></li>
							<li><a href="#" class="search_options">All Branches</a></li>
						</ul>
					</div>
					<input type="text" class="form-control" name="search" id="search" placeholder="Search">
					<div class="input-group-btn">
						<button type="submit" class="btn btn-default" id="searchSubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
				</div>
			</form>
			<div class="searchBarResults py-0" id="searchBarResults">
				<div class="list-group" id="searchResults"></div>
			</div>
		</div>
		<script type="text/template" data-template="searchResultLineHeaderTemplate">
			<a href="#" class="list-group-item">Found ${count} results</a>
		</script>
		
		<script type="text/template" data-template="searchResultLineTemplate">
			<a href="${url}" class="list-group-item searchBarElement" onClick="searchOpenURL(event, '${url}'); return false;">
				<i class="searchBarNewWindow fa fa-external-link" aria-hidden="true"></i>
				<h4 class="list-group-item-heading">${title}</h4>
				<p class="list-group-item-text">${description}</p>
			</a>
		</script>
		<!-- Content Header (Page header) -->
		<section class="content-header"><h1>Balance Sheet</h1>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<div class="box box-success">
				<form class="form-horizontal" method="get" enctype="multipart/form-data">
					<input type="hidden" name="search" value="1">
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<label>
									<input type="radio" name="balance_sheet_type" id="inputCashBasis" value="cash" checked>
									Cash Basis &nbsp;&nbsp;
								</label>
								<label>
									<input type="radio" name="balance_sheet_type" id="inputAccrualBasis" value="accrual">
									Accrual Basis
								</label>
							</div>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-5">
								<input type="text" name="end_date" class="form-control date_select" id="endPicker" placeholder="To Date" value="31/12/2023" required>
							</div>
							<div class="col-xs-6">
								<select class="form-control" name="balance_sheet_compare_periods" id="inputBalanceSheetComparePeriods" style="width: 100%;">
									<option value="">Compare with Past Periods</option>
									<optgroup label="Monthly">
										<option value="1_monthly">
											1 period
										</option>
										<option value="2_monthly">
											2 periods
										</option>
										<option value="3_monthly">
											3 periods
										</option>
										<option value="4_monthly">
											4 periods
										</option>
										<option value="5_monthly">
											5 periods
										</option>
										<option value="6_monthly">
											6 periods
										</option>
										<option value="7_monthly">
											7 periods
										</option>
										<option value="8_monthly">
											8 periods
										</option>
										<option value="9_monthly">
											9 periods
										</option>
										<option value="10_monthly">
											10 periods
										</option>
									</optgroup>
									<optgroup label="Yearly">
										<option value="1_yearly">
											1 period
										</option>
										<option value="2_yearly">
											2 periods
										</option>
										<option value="3_yearly">
											3 periods
										</option>
										<option value="4_yearly">
											4 periods
										</option>
										<option value="5_yearly">
											5 periods
										</option>
										<option value="6_yearly">
											6 periods
										</option>
										<option value="7_yearly">
											7 periods
										</option>
										<option value="8_yearly">
											8 periods
										</option>
										<option value="9_yearly">
											9 periods
										</option>
										<option value="10_yearly">
											10 periods
										</option>
									</optgroup>
								</select>
							</div>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-2">
                <span class="input-group-btn">
                  <button type="submit" class="btn bg-olive btn-flat">Search!</button>
                </span>
								<span class="input-group-btn">
                  <button type="button" class="btn bg-purple  btn-flat" onClick="parent.location='https://x.loandisk.com/accounting/balance_sheet.php'">Reset!</button>
                </span>
							</div>
						</div>
					</div><!-- /.box-body -->
				</form>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div id="export_button"></div>
				</div>
			</div>
			<div class="box box-info">
				<div class="box-body table-responsive no-padding">
					<div class="col-sm-7">
						<table id="reports_table" class="table table-bordered table-hover">
							<thead>
							<tr class="bg-gray-light">
								<th class="text-bold" style="font-size: 22px;">Balance Sheet</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td></td>
								<td style="text-align: right;"><b>31st Dec 23</b></td>
							</tr>
							<tr>
								<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #3D9970">Assets</td>
								<td></td>
							</tr>
							<tr>
								<td class="text-bold" style="padding-left: 50px; font-size: 14px;">Cash and Banks</td>
								<td></td>
							</tr>
							<tr>
								<td style="padding-left: 75px">Cash</td>
								<td class="text-right"><a
										href="https://x.loandisk.com/accounting/dea/ledger/account_ledger/view_ledger_for_account.php?search_account_ledger=1&search_box_cash_basis=cash&search_box_from_date=01/01/2023&search_box_to_date=31/12/2023&coa_id=3&branches_select[]=55662"
										target="_blank">8 345,08</a></td>
							</tr>
							<tr>
								<td style="padding-left: 75px"><b>Total</b></td>
								<td class="text-right"><b>8 345,08</b></td>
							</tr>
							<tr>
								<td class="text-bold" style="padding-left: 50px; font-size: 14px;">Loans</td>
								<td></td>
							</tr>
							<tr>
								<td style="padding-left: 75px">Gross Loans - Principal</td>
								<td class="text-right"><a
										href="https://x.loandisk.com/accounting/dea/ledger/account_ledger/view_ledger_for_account.php?search_account_ledger=1&search_box_cash_basis=cash&search_box_from_date=01/01/2023&search_box_to_date=31/12/2023&coa_id=21&branches_select[]=55662"
										target="_blank">1 675,00</a></td>
							</tr>
							<tr class="bg-gray">
								<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Total Assets</td>
								<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">10 020,08</td>
							</tr>
							<tr>
								<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #9c3328">Liabilities</td>
								<td></td>
							</tr>
							<tr class="">
								<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000;">Total Liabilities</td>
								<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"></td>
							</tr>
							<tr>
								<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #9c3328">Equity</td>
								<td></td>
							</tr>
							<tr>
								<td style="padding-left: 75px">Branch Equity</td>
								<td class="text-right"><a
										href="https://x.loandisk.com/accounting/dea/ledger/account_ledger/view_ledger_for_account.php?search_account_ledger=1&search_box_cash_basis=cash&search_box_from_date=01/01/2023&search_box_to_date=31/12/2023&coa_id=36&branches_select[]=55662"
										target="_blank">10 000,00</a></td>
							</tr>
							<tr>
								<td style="padding-left: 75px">Net Income After Taxes and Subsidy (Current yr)</td>
								<td class="text-right">20,08</td>
							</tr>
							<tr class="">
								<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000;">Total Equity</td>
								<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000">10 000,00</td>
							</tr>
							<tr class="bg-gray">
								<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Total Liability + Total
									Equity (Equal to Total Assets)
								</td>
								<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">10 020,08</td>
							</tr>
							</tbody>
						</table>
						<br><br>
					</div>
				</div>
			</div>
			<script type="text/javascript" language="javascript">
				$(document).ready(function () {
					var dataTable = $('#reports_table').DataTable({
						"paging": false,
						"fixedHeader": {
							"header": false,
							"footer": false
						},
						"lengthChange": true,
						"searching": false,
						"ordering": false,
						"info": false,
						"autoWidth": true,


						"order": [[0, "asc"]],
						"drawCallback": function (settings) {
							$("#reports_table").wrap("<div class='table-responsive'></div>");
						}
					});
					var buttons = new $.fn.dataTable.Buttons(dataTable, {
						"buttons": [
							{
								extend: 'collection',
								text: 'Export Data',
								buttons: [
									'copyHtml5',
									'excelHtml5',
									'csvHtml5',
									'print'
								]
							}
						]
					}).container().appendTo($('#export_button'));

				});
			</script>
			<script>
				$("#pre_loader").hide();
			
			</script>
		
		</section>
	</div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
<script src="https://x.loandisk.com/plugins/select2/select2.full.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="https://x.loandisk.com/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="https://x.loandisk.com/dist/js/app.min.js"></script>

<script src="https://x.loandisk.com/include/js/confirm_dialog1.js"></script>
<script src="https://x.loandisk.com/include/js/analytics_live.js"></script>
<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript">
	$(".numeric").numeric();
	$(".positive").numeric({negative: false});
	$(".positive-integer").numeric({decimal: false, negative: false});
	$(".negative-integer").numeric({decimal: false, negative: true});
	$(".decimal-2-places").numeric({decimalPlaces: 2});
	$(".decimal-4-places").numeric({decimalPlaces: 4});
	$("#remove").click(
		function (e) {
			e.preventDefault();
			$(".numeric,.positive,.positive-integer,.decimal-2-places,.decimal-4-places").removeNumeric();
		}
	);
</script>
<script>
	$(function () {
		//Initialize Select2 Elements
		$(".period_select").select2({
			placeholder: "Compare with Past Periods"


		});

	});
</script>
<script>
	$(function () {
		$('.date_select').datepick({

			defaultDate: '31/12/2023', showTrigger: '#calImg',
			yearRange: 'c-20:c+20', showTrigger: '#calImg',

			dateFormat: 'dd/mm/yyyy',
			minDate: '01/01/1980'
		});
	});

</script>
<div style="display:none">balance_sheet</div>
</body>
</html>