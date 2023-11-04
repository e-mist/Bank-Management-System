<?php
session_start();
  
if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
    $_SESSION['status'] = 'invalid';
    echo "<script>window.location.href = '/banksystem/src/index.php'</script>";
}

$moneyUser = $_SESSION['user']['User_Money'];
// echo $_SESSION['status'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="main.css">
    <script src="bootstrap.bundle.min.js"></script>
    <title>Home - Bank Management System</title>
</head>
<body class="bg-dark text-white">
    <div class="h_container p-3 container-fluid d-flex">
        <h1 class="w-100">Home - Bank Management System</h1>
        <div class="btn btn-secondary d-flex justify-content-center align-items-center" id="logoutBtn" style="width:10%">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg> &nbsp; Log Out
        </div>
    </div>
    <div class="container-fluid d-grid" id="main">
        <div class="container">
        
            <h3 class="w-100 text-center my-5">Hello <b><span id="user"><?php echo $_SESSION['username']?></span></b>, what would you like  to do today?</h3>
        </div>
        <div class="container" style="width: 50%">
            <div class="row">
                <div class="col-6 ">
                    <div class="btn btn-secondary w-100 p-5 my-2" id="withdrawBtn" style="font-size:1.5rem;">Withdraw</div>
                </div>
                <div class="col-6">
                    <div class="btn btn-secondary w-100 p-5 my-2" id="depositBtn" style="font-size:1.5rem;">Deposit</div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 ">
                    <div class="btn btn-secondary w-100 p-5 my-2" id="balanceBtn" style="font-size:1.5rem;">Balance</div>
                </div>
                <div class="col-6">
                    <div class="btn btn-secondary w-100 p-5 my-2" id="transactionBtn" style="font-size:1.5rem;">Transaction</div>
                </div>
            </div>
            <div class="row d-grid"> 
                <div class="col">
                    <div class="btn btn-secondary w-100 p-5 my-2" id="manageBtn" style="font-size:1.5rem;">Manage Account</div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="text-end"><span id="time"></span></h1>
        </div>
    </div>
    <div class="container-fluid d-none my-4" id="withdraw">
        <div class="container d-grid align-items-center" style="width: 30%; height: 70vh;">
            <div class="s_container row py-3 px-3">
                <h2 class="text-center">Withdraw</h2>
                <p class="text-secondary text-uppercase mt-5"><b>Amount</b></p>
                <input class="p-2" type="number" id="withdrawInput">

                <div class="container d-flex justify-content-center mt-5">
                    <div class="btn btn-secondary mx-1" id="withdrawSendBtn">Send a request</div>
                    <div class="btn btn-secondary mx-1" id="backBtn">Cancel</div>
                </div>
            </div>
        </div>
            
    </div>
    <div class="container-fluid d-none my-4" id="deposit">
        <div class="container d-grid align-items-center" style="width: 30%; height: 70vh;">
            <div class="s_container row py-3 px-3">
                <h2 class="text-center">Deposit</h2>
                <p class="text-secondary text-uppercase mt-5"><b>Amount</b></p>
                <input class="p-2" type="number" id="depositInput">

                <div class="container d-flex justify-content-center mt-5">
                    <div class="btn btn-secondary mx-1" id="depositSendBtn">Send a request</div>
                    <div class="btn btn-secondary mx-1" id="backBtn">Cancel</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-none" id="balance">
        <div class="container d-grid align-items-center" style="width: 30%; height: 70vh;">
                <div class="s_container row py-3 px-3">
                    <h2 class="text-center">Balance</h2>
                    <p class="text-secondary text-uppercase mt-5"><b>Your balance</b></p>
                    
                    <p class="fontSize"><span id="userBalance"><?php echo $moneyUser?></span> PHP</p>

                    <div class="container mt-5">
                        <div class="btn btn-secondary mx-1 w-100" id="backBtn">Back</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col container-fluid d-none mt-5" id="transaction"  style="width: 80%;">
        <div class="row">
            <h2 class="text-center">Transaction</h2>
        </div>
        <div class="row h-100 mt-2 overflow-y-scroll transaction_style"  style="max-height: 50vh;">
            <table class="table table-secondary">
                <thead class="sticky-top">
                    <tr> 
                        <th scope="col">Action</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="table-dark" id="showTransaction">
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="btn btn-secondary mt-5" id="backBtn" style="width: 10%; margin: 0 auto">Back</div>
        </div>     
    </div>
    <div class="container-fluid d-none mt-5" id="manageaccount" >
        <div class="container-fluid d-grid align-items-center s_container mt-5" style="width: 30%; height: 50vh;">
            <div class="row mt-2 mb-5">
                <h2 class="text-center">Manage Account</h2>
            </div>
            <div class="row px-5 mt-2 mb-5">
                <div class="btn btn-secondary" id="changePassBtn">Change Password</div>
            </div>
            <div class="row mt-5">
                <div class="btn btn-secondary mt-3" id="backBtn" style="width: 20%; margin: 0 auto">Back</div>
            </div> 
        </div>
    </div>
    <div class="container-fluid d-none mt-5" id="changePassword">
        <div class="container-fluid d-grid align-items-center s_container mt-5" style="width: 30%; height: 55vh;">
            <div class="row">
                <div class="row mt-2 mb-5">
                    <h2 class="text-center">Change Password</h2>
                </div>
            </div>
            <div class="row">
                <form action="#" class="d-grid" id="change">
                    <input class="mt-3 p-2 mx-4 rounded" type="password" name="currentPass" id="currentPass" placeholder="Current Password">
                    <input class="mt-3 p-2 mx-4 rounded" type="password" name="newPass" id="newPass" placeholder="New Password">
                    <input class="mt-3 p-2 mx-4 rounded" type="password" name="retypeNewPass" id="retypeNewPass" placeholder="Re-type New Password">
                </form>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="btn btn-secondary mx-2" id="submitChangePass" style="width: 30%;">Submit</div>
                <div class="btn btn-secondary mx-2" id="backBtnPass" style="width: 20%;">Cancel</div>
            </div> 
        </div>
    </div>
    <input type="hidden" name="hiddenStatus" id="hiddenStatus" value="invalid">

<script src="jquery.js"></script>
<script src="main.js"></script>
</body>
</html>