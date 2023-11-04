$(document).ready(function(){
    // Registration form Change
    $('#reg').click(function(){
        $('#login').removeClass('d-grid')
        $('#login').addClass('d-none')

        $('#register').removeClass('d-none')
        $('#register').addClass('d-grid')
    })

    // Log In form Change
    $('#log').click(function(){
        $('#register').removeClass('d-grid')
        $('#register').addClass('d-none')

        $('#login').removeClass('d-none')
        $('#login').addClass('d-grid')
    })

    // Log In Data from the Database
    $('#loginBtn').click(function(e){
        e.preventDefault()
        if($('#username').val() == "" || $('#password').val() == ""){
            alert('Fill up all fields! Please try again.')
            $('#login').trigger('reset')
        }else{
            $.ajax({
                url: 'login.php',
                data:{
                    username: $('#username').val(),
                    password: $('#password').val()
                },
                method: 'POST',
                dataType: 'JSON',
                success:function(data){
                    if(data['status'] == 'invalid'){
                        alert('Invalid Username or Password! Please try again.')
                    }else{
                        alert('Log In Successfully!')
                        window.location.href = '/banksystem/src/home.php'
                    }
                    $('#login').trigger('reset')
                    
                }
    
            })
        }
        
        
    })

    // Register Data in the Database
    $('#registerBtn').click(function(e){
        e.preventDefault()
        if($('#reg_username').val() == '' || $('#reg_password').val() == '' || $('#re_reg_password').val() == ''){
            alert('Fill up all fields! Please try again.')
            $('#register').trigger('reset')
        }else if($('#reg_password').val() == $('#re_reg_password').val()){
            
            $.ajax({
                url: 'register.php',
                method: 'POST',
                data:{
                    reg_username: $('#reg_username').val(),
                    reg_password: $('#reg_password').val(),
                    retypePassword: $('#re_reg_password').val()
                },
                success:function(data){
                    alert(data)
                    $('#register').trigger('reset')
                }
            })

        }else{
            alert('Password must be the same! Please try again.')
            $('#register').trigger('reset')
        }
        
    })

    // Time
    function refreshTime() {
        const timeDisplay = document.getElementById("time");
        const dateString = new Date().toLocaleString();
        const formattedString = dateString.replace(", ", " - ");
        timeDisplay.textContent = formattedString;
    }
    setInterval(refreshTime, 1000)
    
    // Transform User First Letter
    $('#user').css('textTransform', 'capitalize');

    // Withdraw Button
    $('#withdrawBtn').click(function(){
        $('#main').removeClass('d-grid')
        $('#main').addClass('d-none')

        $('#withdraw').removeClass('d-none')
        $('#withdraw').addClass('d-grid')
    })

    // Deposit Button
    $('#depositBtn').click(function(){
        $('#main').removeClass('d-grid')
        $('#main').addClass('d-none')

        $('#deposit').removeClass('d-none')
        $('#deposit').addClass('d-grid')
    })

    // Balance Button
    $('#balanceBtn').click(function(){
        $('#main').removeClass('d-grid')
        $('#main').addClass('d-none')

        $('#balance').removeClass('d-none')
        $('#balance').addClass('d-grid')
    })

    // Transaction Button
    $('#transactionBtn').click(function(){
        $('#main').removeClass('d-grid')
        $('#main').addClass('d-none')

        $('#transaction').removeClass('d-none')
        $('#transaction').addClass('d-grid')
    })

    // Manage Account Button
    $('#manageBtn').click(function(){
        $('#main').removeClass('d-grid')
        $('#main').addClass('d-none')

        $('#manageaccount').removeClass('d-none')
        $('#manageaccount').addClass('d-grid')
    })

    // Back Button
    $('*#backBtn').click(function(){
        $('#withdraw').removeClass('d-grid')
        $('#withdraw').addClass('d-none')

        $('#deposit').removeClass('d-grid')
        $('#deposit').addClass('d-none')

        $('#balance').removeClass('d-grid')
        $('#balance').addClass('d-none')

        $('#transaction').removeClass('d-grid')
        $('#transaction').addClass('d-none')

        $('#manageaccount').removeClass('d-grid')
        $('#manageaccount').addClass('d-none')

        $('#main').removeClass('d-none')
        $('#main').addClass('d-grid')
        location.reload()
    })

    // Log Out Button
    $('#logoutBtn').click(function(){
        
        $.ajax({
            url: 'logout.php',
            method: 'POST',
            data: {
                logout: $('#hiddenStatus').val()
            },
            success:function(data){
                alert('Log out Sucessfully! See you next time '+ data + '.')
                location.href = "/banksystem/src/index.php"
            }
        })
    })

    
    // Withdrawal Send Request
    $('#withdrawSendBtn').click(function(){

        if($('#withdrawInput').val() == ''){
            alert("Can't process request! Please try again.")
        }else{
            let withdrawAmount = parseInt($('#withdrawInput').val())

            if(withdrawAmount <= 0){
                alert("Can't process request! Please try again.")
                withdrawAmount = ''
            }else{
                $.ajax({
                    url: 'lastWithdrawal.php',
                    method: 'GET',
                    dataType: 'JSON',
                    success: function(lastdata){
                        let lastData = parseInt(lastdata)

                        $.ajax({
                            url: 'withdrawal.php',
                            method: 'POST',
                            dataType: 'JSON',
                            data:{
                                withdraw: $('#withdrawInput').val()
                            },
                            success: function(data){
                                let userMoney = parseInt(data['data']['User_Money'])

                                if(lastData >= withdrawAmount){
                                    alert('Withdrawn Successfully.')
                                    alert('Current Balance: '+ userMoney)

                                    $.ajax({
                                        url: 'setWithdrawTransaction.php',
                                        method: 'POST',
                                        data:{
                                            action: 'Withdraw',
                                            withdraw: $('#withdrawInput').val()
                                        },
                                        dataType: 'JSON',
                                        success: function(data){
    
                                        }
                                    })

                                }else if(withdrawAmount == lastData){
                                    alert('Withdrawn Successfully.')
                                    alert('Current Balance: '+ userMoney)

                                    $.ajax({
                                        url: 'setWithdrawTransaction.php',
                                        method: 'POST',
                                        data:{
                                            action: 'Withdraw',
                                            withdraw: $('#withdrawInput').val()
                                        },
                                        dataType: 'JSON',
                                        success: function(data){
    
                                        }
                                    })
                                    
                                }else{
                                    alert("Can't process request! Please try again.") 
                                }
                                
                                

                            }
                        })

                        
                    }
                })
            }  
        }
        

    })

    // Deposit Send Request
    $('#depositSendBtn').click(function(){
        $.ajax({
            url: 'setDepositTransaction.php',
            method: 'POST',
            data:{
                action: "Deposit",
                deposit: $('#depositInput').val()
            },
            success: function(data){
            }
        })
        if($('#depositInput').val() == ''){
            alert("Can't process request! Please try again.")
        }else{
            let depositAmount = parseInt($('#depositInput').val())

            if(depositAmount <= 0){
                alert("Can't process request! Please try again.")
            }else{
                $.ajax({
                    url: 'deposit.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        deposit: $('#depositInput').val()
                    },
                    success: function(data){
                        let userMoney = parseInt(data['data']['User_Money'])

                        if(userMoney <= 0){
                            alert("Can't process request! Please try again.") 
                        }else{
                            alert('Deposit Successfully.')
                            alert('Current Balance: '+ userMoney)
                        }              
                    }
                })
            }
        }
    })

    // Transaction Show Data
    $('#transactionBtn').click(function(){
        $.ajax({
            url: 'getTransaction.php',
            method: 'GET',
            dataType: 'JSON',
            success: function(data){
                    showTable = []
                    for(let i = 0; i < data.length; i++){
                        row = `
                            <tr>
                                <td>${data[i]['Action']}</td>
                                <td>${data[i]['Amount']}</td>
                                <td>${data[i]['Date']}</td>
                            </tr>
                            `

                        showTable.push(row)
                    }

                    $('#showTransaction').html(showTable)
                }
            })
    })

    // Manage Account (Reset Password)
    $('#changePassBtn').click(function(e){
        e.preventDefault()
        
        $('#manageaccount').removeClass('d-grid')
        $('#manageaccount').addClass('d-none')

        $('#changePassword').removeClass('d-none')
        $('#changePassword').addClass('d-grid')
        
    })

    // Reset Back Button
    $('#backBtnPass').click(function(e){
        e.preventDefault()

        $('#manageaccount').removeClass('d-none')
        $('#manageaccount').addClass('d-grid')

        $('#changePassword').removeClass('d-grid')
        $('#changePassword').addClass('d-none')

        $('#change').trigger('reset')
    })

    $('#submitChangePass').click(function(e){
        e.preventDefault()
    
        currentPass = $('#currentPass').val()
        newPass = $('#newPass').val()
        retypeNewPass = $('#retypeNewPass').val()

        if(currentPass == '' || newPass == '' || retypeNewPass == ''){
            alert("Fill up all fields! Please try again.")
            $('#change').trigger('reset')

        }else if(newPass != retypeNewPass){
            alert('Invalid Password! Please try again.')
            $('#change').trigger('reset')

        }else if(newPass == retypeNewPass){
            $.ajax({
                url: 'getPass.php',
                method: 'GET',
                success:function(data){
                    
                    getPass = data

                    $.ajax({
                        url: 'changePassword.php',
                        method: 'POST',
                        data:{
                            current_pass: currentPass,
                            new_pass: newPass
                        },
                        success:function(data){

                            if(currentPass == getPass){
                                alert('Password has been changed successfully.')
                            }else{
                                alert('Invalid Password! Please try again.')
                            }
        
                            $('#change').trigger('reset')
                        }
                    })
                }
            })          
        }

    })

})