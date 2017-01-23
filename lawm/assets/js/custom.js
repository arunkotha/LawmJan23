/* Write here your custom javascript codes */


$(function()
{        
    $("fieldset#four").hide();
    $("fieldset#five").hide();
});


function completeAuthorization()
{
    
    if($('#lawyer').val() != '' && $("#consultation_type").val() != ''  && $("#complain").val() != '' && $("#subject").val() != '' && $("#description").val() != '')
    {
        $('#one').hide();
        $('#two').hide();
        $('#three').hide();
        
        
        $('#four').show();
        $('#five').show();
    
    }
    else
    {
        
        alert('Please fill all the fields');
                
    }
    
    
}



$(document).ready(function(){
    $('#user_mobile').keyup(function() {
        var prefix = '+966';
        if (this.value.substring(0, prefix.length) != prefix){
            $(this).val(prefix)
        }
    })

    $('#lawyer_mobile').keyup(function() {
        var prefix = '+966';
        if (this.value.substring(0, prefix.length) != prefix){
            $(this).val(prefix)
        }
    })
});

function getCertifiedDiv()
{
    if($('#certified').attr('checked')=='checked'){
        $('#certified_div').css('display','block');
    }
    else{
        $('#certified_div').css('display','none');
    }
}

function validLogin(form)
{
    var flag=0;
    var user_name = $('#username').val();
    var password = form.password.value;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(user_name==''){
        $('#username').addClass('error');
        flag=1;
    }
    else if(!email_reg.test(user_name)){
        $('#username').addClass('error');
        flag=1;
    }
    if(password==''){
        $('#password').addClass('error');
        flag=1
    }

    if(flag==1){ return false; }
    else { return true; }
}

function validForgetPassword(form)
{
    var flag=0;
    $('#email').removeClass('error');

    var email = form.email.value;
    //var p = document.getElementById('error');
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(!email_reg.test(email)){
        $('#email').addClass('error');
        flag=1;
    }

    if(flag==1){alert('Invalid Email!');  return false; }
    else { return true; }
}



function authorizeConsultation()
{
    var flag=0;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var password_reg = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))/i;
    
    $('#user_email').removeClass('error');
    $('#user_mobile').removeClass('error');
    $('#user_password').removeClass('error');
    $('#user_password_confirmation').removeClass('error');
    $('#user_email_err').text('');
    $('#user_password_confirmation_err').text('');
    $('#user_password_err').text('');
    
    var user_type_id = 3;
    var email = $('#user_email').val();
    var mobile = $('#user_mobile').val();
    var password = $('#user_password').val();
    var confirm_password = $('#user_password_confirmation').val();
    mobile = mobile.replace('+966','');

   
    if(email==''){
        $('#user_email').addClass('error');
        flag=1;
    }
    else if(!email_reg.test(email)){
        $('#user_email_err').text('Invalid Email');
        $('#user_email').addClass('error');
        flag=1;
    }
    if(mobile==''){
        $('#user_mobile').addClass('error');
        flag=1;
    }
    else if(isNaN(mobile)){
        $('#user_mobile').addClass('error');
        flag=1;
    }
    else if(mobile.length!=10){
        $('#user_mobile').addClass('error');
        flag=1;
    }
    if(password==''){
        $('#user_password').addClass('error');
        flag=1;
    }
    else if(password.length<8){
        $('#user_password').addClass('error');
        $('#user_password_err').text('Password must be minimum 8 characters');
        flag=1;
    }
    else if(!password_reg.test(password)){
        $('#user_password').addClass('error');
        $('#user_password_err').text('Password must be alphanumeric');
        flag=1;
    }
    if(confirm_password==''){
        $('#user_password_confirmation').addClass('error');
        flag=1;
    }
    else if(password!=confirm_password){
        $('#user_password_confirmation').addClass('error');
        $('#user_password_confirmation_err').text('Passwords do not match');
        flag=1;
    }
    
    if(flag==1) {
        return false;
    }
    else if($('#user_checkbox').prop("checked")==false){
        alert('Please agree terms and conditions');
    }
    else{
        $.ajax({
            async: true,
            type: 'POST',
            url: BASE_URL+'index.php/Welcome/checkEmail/',
            data: {email:email,user_type_id:user_type_id},
            dataType: 'json',
            success:function(res){
                if(res.response==0)
                {
                    $('#guest_form_type').val("login");
                    $('#guest_form').submit();
                }
                else
                {
                    $('#guest_form_type').val("register");
                    $('#guest_form').submit();
                }
            }
        });

    }
}


function validUserRegistration()
{
    var flag=0;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var password_reg = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))/i;

    $('#user_username').removeClass('error');
    $('#user_email').removeClass('error');
    $('#user_mobile').removeClass('error');
    $('#user_gender').removeClass('error');
    $('#user_country').removeClass('error');
    $('#user_password').removeClass('error');
    $('#user_password_confirmation').removeClass('error');
    $('#user_email_err').text('');
    $('#user_username_err').text('');
    $('#user_attachment_err').text('');
    $('#user_password_confirmation_err').text('');
    $('#user_password_err').text('');

    var user_name = $('#user_username').val();
    var user_type_id = $('input[name="colorRadio"]:checked').val();

    var email = $('#user_email').val();
    var mobile = $('#user_mobile').val();
    var gender = $('#user_gender').val();
    var country = $('#user_country').val();
    var password = $('#user_password').val();
    var confirm_password = $('#user_password_confirmation').val();
    var user_attachment = $('#user_attachment').val();
    mobile = mobile.replace('+966','');

    if(user_name==''){
        $('#user_username').addClass('error');
        flag=1;
    }
    if(email==''){
        $('#user_email').addClass('error');
        flag=1;
    }
    else if(!email_reg.test(email)){
        $('#user_email_err').text('Invalid Email');
        $('#user_email').addClass('error');
        flag=1;
    }
    if(mobile==''){
        $('#user_mobile').addClass('error');
        flag=1;
    }
    else if(isNaN(mobile)){
        $('#user_mobile').addClass('error');
        flag=1;
    }
    else if(mobile.length!=10){
        $('#user_mobile').addClass('error');
        flag=1;
    }

    if(gender=='' || gender==0){
        $('#user_gender').addClass('error');
        flag=1;
    }
    if(country=='' || country==0){
        $('#user_country').addClass('error');
        flag=1;
    }

    if(password=='')
    {
        $('#user_password').addClass('error');
        flag=1;
    }
    else if(password.length<8)
    {
        $('#user_password').addClass('error');
        $('#user_password_err').text('Password must be minimum 8 characters');
        flag=1;
    }
    else if(!password_reg.test(password))
    {
        $('#user_password').addClass('error');
        $('#user_password_err').text('Password must be alphanumeric');
        flag=1;
    }
    if(confirm_password=='')
    {
        $('#user_password_confirmation').addClass('error');
        flag=1;
    }
    else if(password!=confirm_password)
    {
        $('#user_password_confirmation').addClass('error');
        $('#user_password_confirmation_err').text('Password not match');
        flag=1;
    }
    if(user_attachment!='')
    {
        if(!user_attachment.match(/(?:gif|jpg|png|bmp|jpeg|PNG|JPG|GIF|BMP|JPEG)$/))
        {
            $('#user_attachment_err').text('Please Select Image');
        }
    }
    if(flag==1) 
    {
        return false;
    }
    else if($('#user_checkbox').prop("checked")==false)
    {
        alert('Please agree terms and conditions');
    }
    else
    {
        $.ajax({
            async: true,
            type: 'POST',
            url: BASE_URL+'index.php/Welcome/checkUsername/',
            data: {user_name:user_name,user_type_id:user_type_id},
            dataType: 'json',
            success:function(res){
                if(res.response==0){
                    $('#user_username_err').text('Username already exists');
                }
                else{
                    $.ajax({
                        async: true,
                        type: 'POST',
                        url: BASE_URL+'index.php/Welcome/checkEmail/',
                        data: {email:email,user_type_id:user_type_id},
                        dataType: 'json',
                        success:function(res){
                            if(res.response==0){
                                $('#user_email_err').text('Email already exists');
                            }
                            else{
                                $('#user_frm').submit();
                            }
                        }
                    });
                }
            }
        });

    }
}


// test service start


function validImageUpload()
{
    var flag=0;

    $('#user_email').removeClass('error');
    $('#user_email_err').text('');
    $('#user_attachment_err').text('');

    var email = $('#user_email').val();
    var user_attachment = $('#user_attachment').val();

    if(email==''){
        $('#user_email').addClass('error');
        flag=1;
    }
    else if(!email_reg.test(email)){
        $('#user_email_err').text('Invalid Email');
        $('#user_email').addClass('error');
        flag=1;
    }
    if(user_attachment!='')
    {
        if(!user_attachment.match(/(?:gif|jpg|png|bmp|jpeg|PNG|JPG|GIF|BMP|JPEG)$/))
        {
            $('#user_attachment_err').text('Please Select Image');
        }
    }
    if(flag==1) 
    {
        return false;
    }
    else
    {
        
        $('#user_frm').submit();

    }
}



// test service end


function validLawyerRegistration()
{
    var flag=0;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var password_reg = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))/i;

    $('#lawyer_username').removeClass('error');
    $('#lawyer_email').removeClass('error');
    $('#lawyer_mobile').removeClass('error');
    $('#lawyer_gender').removeClass('error');
    $('#lawyer_country').removeClass('error');
    $('#lawyer_password').removeClass('error');
    $('#lawyer_password_confirmation').removeClass('error');
    $('#lawyer_email_err').text('');
    $('#lawyer_username_err').text('');
    $('#lawyer_attachment_err').text('');
    $('#lawyer_password_confirmation_err').text('');
    $('#lawyer_password_err').text('');

    var user_name = $('#lawyer_username').val();
    var user_type_id = $('input[name="colorRadio"]:checked').val();
    var email = $('#lawyer_email').val();
    var mobile = $('#lawyer_mobile').val();
    var gender = $('#lawyer_gender').val();
    var country = $('#lawyer_country').val();
    var password = $('#lawyer_password').val();
    var confirm_password = $('#lawyer_password_confirmation').val();
    var lawyer_attachment = $('#lawyer_attachment').val();
    mobile = mobile.replace('+966','');

    if(user_name==''){
        $('#lawyer_username').addClass('error');
        flag=1;
    }
    if(email==''){
        $('#lawyer_email').addClass('error');
        flag=1;
    }
    else if(!email_reg.test(email)){
        $('#lawyer_email_err').text('Invalid Email');
        $('#lawyer_email').addClass('error');
        flag=1;
    }
    if(mobile==''){
        $('#lawyer_mobile').addClass('error');
        flag=1;
    }
    else if(isNaN(mobile)){
        $('#lawyer_mobile').addClass('error');
        flag=1;
    }
    else if(mobile.length!=10){
        $('#lawyer_mobile').addClass('error');
        flag=1;
    }
    if(gender=='' || gender==0){
        $('#lawyer_gender').addClass('error');
        flag=1;
    }
    if(country=='' || country==0){
        $('#lawyer_country').addClass('error');
        flag=1;
    }
    if(password==''){
        $('#lawyer_password').addClass('error');
        flag=1;
    }
    else if(password.length<8){
        $('#lawyer_password').addClass('error');
        $('#lawyer_password_err').text('Password must be minimum 8 characters');
        flag=1;
    }
    else if(!password_reg.test(password)){
        $('#lawyer_password').addClass('error');
        $('#lawyer_password_err').text('Password must be alphanumeric');
        flag=1;
    }
    if(confirm_password==''){
        $('#lawyer_password_confirmation').addClass('error');
        flag=1;
    }
    else if(password!=confirm_password){
        $('#lawyer_password_confirmation').addClass('error');
        $('#lawyer_password_confirmation_err').text('Password not match');
        flag=1;
    }
    if(lawyer_attachment!=''){
        if(!lawyer_attachment.match(/(?:gif|jpg|png|bmp|jpeg|PNG|JPG|GIF|BMP|JPEG)$/))
        {
            $('#lawyer_attachment_err').text('Please Select Image');
        }
    }

    if(flag==1)
    {
        return false;
    }
    else if($('#lawyer_checkbox').prop("checked")==false)
    {
        alert('Please agree terms and conditions');
    }
    else
    {
        $.ajax({
            async: true,
            type: 'POST',
            url: BASE_URL+'index.php/Welcome/checkUsername/',
            data: {user_name:user_name,user_type_id:user_type_id},
            dataType: 'json',
            success:function(res){
                if(res.response==0){
                    $('#lawyer_username_err').text('Username already exists');
                }
                else{
                    //$('#lawyer_frm').submit();
                    $.ajax({
                        async: true,
                        type: 'POST',
                        url: BASE_URL+'index.php/Welcome/checkEmail/',
                        data: {email:email,user_type_id:user_type_id},
                        dataType: 'json',
                        success:function(res){
                            if(res.response==0){
                                $('#lawyer_email_err').text('Email already exists');
                            }
                            else{
                                $('#lawyer_frm').submit();
                            }
                        }
                    });
                }
            }
        });

    }
}

function changePassword()
{
    var flag = 0;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var password_reg = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))/i;
    /*$('#p_user_name').removeClass('error');
    $('#p_email').removeClass('error');*/
    $('#old_password').removeClass('error');
    $('#password').removeClass('error');
    $('#confirm_password').removeClass('error');

    /*$('#p_email_err').text('');*/
    $('#old_password_err').text('');
    $('#password_err').text('');
    $('#confirm_password_err').text('');

    /*var user_name = $('#p_user_name').val();
    var email = $('#p_email').val();*/
    var old_password = $('#old_password').val();
    var password = $('#password').val();
    var confirm_passowrd = $('#confirm_password').val();

    /*if(user_name==''){
        $('#p_user_name').addClass('error');
        flag=1;
    }

    if(email==''){
        $('#p_email').addClass('error');
        flag=1;
    }
    else if(!email_reg.test(email)){
        $('#p_email_err').text('Invalid Email');
        $('#p_email').addClass('error');
        flag=1;
    }*/
    if(old_password==''){
        $('#old_password').addClass('error');
        flag=1;
    }
    if(password==''){
        $('#password').addClass('error');
        flag=1;
    }
    else if(password.length<8){
        $('#password').addClass('error');
        $('#password_err').text('Password must be minimum 8 characters');
        flag=1;
    }
    else if(!password_reg.test(password)){
        $('#password').addClass('error');
        $('#password_err').text('Password must be alphanumeric');
        flag=1;
    }
    if(confirm_passowrd==''){
        $('#confirm_password').addClass('error');
        flag=1;
    }
    else if(password!=confirm_passowrd){
        $('#confirm_password_err').text('Password not match');
        $('#confirm_password').addClass('error');
        flag=1;
    }
    else if(old_password==password){
        $('#old_password').addClass('error');
        $('#old_password_err').text('New password not same as old password');
        flag=1;
    }

    if(flag==0)
    {
        $.ajax({
            async: true,
            type: 'POST',
            url: BASE_URL+'index.php/Welcome/changeUserPassword/',
            data: {password:password,old_password:old_password},
            dataType: 'json',
            success:function(res){
                    if(res.response==1){
                        /*$('#p_user_name').val('');
                        $('#p_email').val('');*/
                        $('#old_password').val('');
                        $('#password').val('');
                        $('#confirm_password').val('');

                        /*$('#p_user_name').removeClass('error');
                        $('#p_email').removeClass('error');*/
                        $('#old_password').removeClass('error');
                        $('#password').removeClass('error');
                        $('#confirm_password').removeClass('error');

                        $('#old_password_err').text('');
                        $('#p_email_err').text('');
                        $('#confirm_password_err').text('');
                    }
                    $('#change_password_msg').text(res.data);
            }
        });
    }
}

function clearChangePassword()
{
    $('#p_user_name').val('');
    $('#p_email').val('');
    $('#password').val('');
    $('#confirm_password').val('');

    $('#p_user_name').removeClass('error');
    $('#p_email').removeClass('error');
    $('#password').removeClass('error');
    $('#confirm_password').removeClass('error');

    $('#p_email_err').text('');
    $('#confirm_password_err').text('');
}

function updateProfile()
{
    var letter = /[a-zA-Z]/;
    var number = /[0-9]/;
    var password = $('#password').val();
    var flag = 0
    $('#password').removeClass('error');
    $('#password_err').text('');
    if(password!=''){
        if(password.length<8){
            $('#password').addClass('error');
            $('#password_err').text('Password must be minimum 8 characters');
            flag = 1;
        }
        else if(!letter.test(password) || !number.test(password)){
            $('#password').addClass('error');
            $('#password_err').text('Password must be alphanumeric');
            flag = 1;
        }
    }
    if(flag==0) {
        $.ajax({
            async: true,
            type: 'POST',
            url: BASE_URL + 'index.php/Welcome/updateProfile/',
            data: {
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                father_name: $('#father_name').val(),
                gender: $('#gender').val(),
                country_id: $('#country').val(),
                speciality_id: $('#speciality').val(),
                password: $('#password').val()
            },
            dataType: 'json',
            success: function (res) {
                $('#profile_update_msg').text(res.data);
                $('#password').val('');
            }
        });
    }
}

function uploadProfilePic()
{
    var pic = $('#profile_pic').val();

    $('#profile_pic').removeClass('error');
    $('#profile_pic_err').text('');

    if(pic=='')
    {
        $('#profile_pic').addClass('error');
    }
    else if(!pic.match(/(?:gif|jpg|png|bmp|jpeg|PNG|JPG|GIF|BMP|JPEG)$/))
    {
        $('#profile_pic_err').text('Please Select Image');
    }
    else{
        $('#change_profile_pic').submit();
    }
}

function validNewConsultation()
{
    var flag=0; var img =0 ;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    $('#lawyer').removeClass('error');
    $('#consultation_type').removeClass('error');
    $('#experience').removeClass('error');
    $('#complain').removeClass('error');
    $('#date').removeClass('error');
    $('#subject').removeClass('error');
    $('#description').removeClass('error');
    $('#attachment').removeClass('error');

    var lawyer = $('#lawyer').val();
    var consultation_type = $('#consultation_type').val();
    var experience = $('#experience').val();
    var complain = $('#complain').val();
    var date = $('#date').val();
    var subject = $('#subject').val();
    var description = $('#description').val();
    var attachment = $('input[name="attachment[]"]');

    if(lawyer==0 || lawyer==''){
        $('#lawyer').addClass('error');
        flag=1;
    }
    if(consultation_type==0 || consultation_type==''){
        $('#consultation_type').addClass('error');
        flag=1;
    }
    if(experience==0 || experience==''){
        //$('#experience').addClass('error');
        //flag=1;
    }
    if(complain==0 || complain==''){
        $('#complain').addClass('error');
        flag=1;
    }
    if(date==''){
        $('#date').addClass('error');
        flag=1;
    }
    if(subject==''){
        $('#subject').addClass('error');
        flag=1;
    }
    if(description==''){
        $('#description').addClass('error');
        flag=1;
    }

    attachment.each(function(){ console.log(this); console.log($(this));
        if(this.value!=''){
            //if(!this.value.match(/(?:png|PNG|jpg|jpeg|gif|GIF|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX)$/)){
            if(this.value.match(/(?:exe|:EXE)$/)){
                img = 1;
                $(this).replaceWith('<input name="attachment[]" id="attachment" type="file">');
            }
        }
    });

    if(img==1){
        alert('Invalid file format.');
        return false;
    }


    if(flag==0){
        return true;
    }
    else{
        return false;
    }
}

function getReject(id,type)
{
    var html='';
    if(type=='consultation')
        html+='<form class="sky-form"><table><tr><td><label class="textarea"><textarea id="reject_cmt" rows="4" cols="40"></textarea></label></td></tr><tr><td><input onclick="updateConsultation('+id+',\'rejected\')" class="btn" type="button" value="Submit"></td></tr></table></form>';
    if(type=='contract-writing')
        html+='<form class="sky-form"><table><tr><td><label class="textarea"><textarea id="reject_cmt" rows="4" cols="40"></textarea></label></td></tr><tr><td><input onclick="updateContractWriting('+id+',\'rejected\')" class="btn" type="button" value="Submit"></td></tr></table></form>';
    if(type=='company')
        html+='<form class="sky-form"><table><tr><td><label class="textarea"><textarea id="reject_cmt" rows="4" cols="40"></textarea></label></td></tr><tr><td><input onclick="updateEstablishCompany('+id+',\'rejected\')" class="btn" type="button" value="Submit"></td></tr></table></form>';
    if(type=='appeal')
        html+='<form class="sky-form"><table><tr><td><label class="textarea"><textarea id="reject_cmt" rows="4" cols="40"></textarea></label></td></tr><tr><td><input onclick="updateAppeal('+id+',\'rejected\')" class="btn" type="button" value="Submit"></td></tr></table></form>';

    $('#content').html(html);
}

function updateConsultation(consultation_id,status)
{
    var cmt = '';
    if(status=='rejected'){
        cmt = $('#reject_cmt').val();
        if(cmt==''){
            $('#reject_cmt').css('border','1px solid red');
            return false;
        }
    }
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL+'index.php/Welcome/updateConsultation/',
        data: {id_consultation:consultation_id,status:status,cmt:cmt},
        dataType: 'json',
        success:function(res){
            if(res.response==1){
                location.reload();
            }
        }
    });
}

function updateAppeal(appeal_id,status)
{
    var cmt = '';
    if(status=='rejected'){
        cmt = $('#reject_cmt').val();
        if(cmt==''){
            $('#reject_cmt').css('border','1px solid red');
            return false;
        }
    }
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL+'index.php/Welcome/updateAppeal/',
        data: {id_appeal:appeal_id,status:status,cmt:cmt},
        dataType: 'json',
        success:function(res){
            if(res.response==1){
                location.reload();
            }
        }
    });
}

function updateEstablishCompany(id_company,status)
{
    var cmt = '';
    if(status=='rejected'){
        cmt = $('#reject_cmt').val();
        if(cmt==''){
            $('#reject_cmt').css('border','1px solid red');
            return false;
        }
    }
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL+'index.php/Welcome/updateEstablishCompany/',
        data: {id_company:id_company,status:status,cmt:cmt},
        dataType: 'json',
        success:function(res){
            if(res.response==1){
                location.reload();
            }
        }
    });
}

function updateContractWriting(id_contract_writing,status)
{
    var cmt = '';
    if(status=='rejected'){
        cmt = $('#reject_cmt').val();
        if(cmt==''){
            $('#reject_cmt').css('border','1px solid red');
            return false;
        }
    }
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL+'index.php/Welcome/updateContractWriting/',
        data: {id_contract_writing:id_contract_writing,status:status,cmt:cmt},
        dataType: 'json',
        success:function(res){
            if(res.response==1){
                location.reload();
            }
        }
    });
}

function addContractWriting()
{
    $('#new_contract_writing input,textarea,select').removeClass('error');

    $('#lawyer').val(0);
    $('#experience').val(0);
    $('#subject').val('');
    $('#description').val('');
    $('#attachment_div').html('<input class="" name="attachment" id="attachment" type="file" />');
    $('#id_contract_writing').val('');
}

function addCompany()
{
    $('#new_contract_writing input,textarea,select').removeClass('error');

    $('#lawyer').val(0);
    $('#experience').val(0);
    $('#subject').val('');
    $('#description').val('');
    $('#attachment_div').html('<input class="" name="attachment" id="attachment" type="file" />');
    $('#id_company').val('');
}

function addAppeal()
{
    $('#new_contract_writing input,textarea,select').removeClass('error');

    $('#lawyer').val(0);
    $('#appeal_type').val(0);
    $('#experience').val(0);
    $('#subject').val('');
    $('#description').val('');
    $('#attachment_div').html('<input class="" name="attachment" id="attachment" type="file" />');
    $('#id_appeal').val('');
}

function validContractWriting()
{
    var flag = 0; 
    var img =0;
    var lawyer = $('#lawyer').val();
    var experience = $('#experience').val();
    var subject = $('#subject').val();
    var description = $('#description').val();
    var attachment = $('input[name="attachment[]"]');

    $('#new_contract_writing input,textarea,select, attachment').removeClass('error');

    if(lawyer=='' || lawyer==0){
        $('#lawyer').addClass('error'); flag=1;
    }
    if(experience=='' || experience==0){
        //$('#experience').addClass('error'); flag=1;
    }
    if(subject==''){
        $('#subject').addClass('error'); flag=1;
    }
    if(description==''){
        $('#description').addClass('error'); flag=1;
    }

    attachment.each(function(){ console.log(this); console.log($(this));
        if(this.value!=''){
            //if(!this.value.match(/(?:png|PNG|jpg|jpeg|gif|GIF|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX)$/)){
            if(this.value.match(/(?:exe|:EXE)$/)){
                img = 1;
                $(this).replaceWith('<input name="attachment[]" id="attachment" type="file">');
            }
        }
    });

    if(img==1)
    {
        alert('Invalid file format.');
        return false;
    }

    if(flag==0)
    {
        return true;
    }
    else
    {
        return false;
    }


}

function validEstablishCompany()
{
    var flag = 0; var img = 0;
    var lawyer = $('#lawyer').val();
    var experience = $('#experience').val();
    var subject = $('#subject').val();
    var partner_name = $('#partner_name').val();
    var partner_id = $('#partner_id').val();
    var description = $('#description').val();
    var attachment = $('input[name="attachment[]"]');

    $('#new_establish_company input,textarea,select').removeClass('error');

    if(lawyer=='' || lawyer==0){
        $('#lawyer').addClass('error'); flag=1;
    }
    if(experience=='' || experience==0){
        //$('#experience').addClass('error'); flag=1;
    }
    if(subject==''){
        $('#subject').addClass('error'); flag=1;
    }
    if(partner_name==''){
        $('#partner_name').addClass('error'); flag=1;
    }
    if(partner_id==''){
        $('#partner_id').addClass('error'); flag=1;
    }
    if(description==''){
        $('#description').addClass('error'); flag=1;
    }

    attachment.each(function(){ console.log(this); console.log($(this));
        if(this.value!=''){
            //if(!this.value.match(/(?:png|PNG|jpg|jpeg|gif|GIF|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX)$/)){
            if(this.value.match(/(?:exe|:EXE)$/)){
                img = 1;
                $(this).replaceWith('<input name="attachment[]" id="attachment" type="file">');
            }
        }
    });

    if(img==1)
    {
        alert('Invalid file format.');
        return false;
    }

    if(flag==0)
    {
        return true;
    }
    else    
    {
        return false;
    }

}

function validAppeal()
{
    var flag = 0; var img = 0;
    var lawyer = $('#lawyer').val();
    var appeal_type = $('#appeal_type').val();
    var experience = $('#experience').val();
    var subject = $('#subject').val();
    var description = $('#description').val();
    var attachment = $('input[name="attachment[]"]');

    $('#new_appeal input,textarea,select').removeClass('error');

    if(lawyer=='' || lawyer==0){
        $('#lawyer').addClass('error'); flag=1;
    }
    if(appeal_type=='' || appeal_type==0){
        $('#appeal_type').addClass('error'); flag=1;
    }
    if(experience=='' || experience==0){
        //$('#experience').addClass('error'); flag=1;
    }
    if(subject==''){
        $('#subject').addClass('error'); flag=1;
    }
    if(description==''){
        $('#description').addClass('error'); flag=1;
    }

    attachment.each(function(){ console.log(this); console.log($(this));
        if(this.value!=''){
            //if(!this.value.match(/(?:png|PNG|jpg|jpeg|gif|GIF|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX)$/)){
            if(this.value.match(/(?:exe|:EXE)$/)){
                img = 1;
                $(this).replaceWith('<input name="attachment[]" id="attachment" type="file">');
            }
        }
    });

    if(img==1)
    {
        alert('Invalid file format.');
        return false;
    }

    if( flag==0) 
    {
       return true;
    }
    else
    {
        return false;
    }

}

function getContractWriting(contract_writing_id)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL+'index.php/Welcome/getContractWriting/',
        data: {contract_writing_id:contract_writing_id},
        dataType: 'json',
        success:function(res){
            if(res.response==1){
                console.log(res);
                var data = res.data;
                $('#lawyer').val(data.lawyer_id);
                $('#experience').val(data.experience);
                $('#subject').val(data.subject);
                $('#description').val(data.description);
                $('#id_contract_writing').val(data.id_contract_writing);

            }
        }
    });
}

function getEstablishCompany(company_id)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL+'index.php/Welcome/getEstablishCompany/',
        data: {company_id:company_id},
        dataType: 'json',
        success:function(res){
            if(res.response==1){
                console.log(res);
                var data = res.data;
                $('#lawyer').val(data.lawyer_id);
                $('#experience').val(data.experience);
                $('#subject').val(data.subject);
                $('#description').val(data.description);
                $('#id_company').val(data.id_company);
                $('#partner_name').val(data.partner_name);
                $('#partner_id').val(data.partner_id);
                $('#id_company_partner').val(data.id_company_partner);

            }
        }
    });
}

function getAppeal(appeal_id) {
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL + 'index.php/Welcome/getAppeal/',
        data: {appeal_id: appeal_id},
        dataType: 'json',
        success: function (res) {
            if (res.response == 1) {
                console.log(res);
                var data = res.data;
                $('#lawyer').val(data.lawyer_id);
                $('#appeal_type').val(data.appeal_type);
                $('#experience').val(data.experience);
                $('#subject').val(data.subject);
                $('#description').val(data.description);
                $('#id_appeal').val(data.id_appeal);
            }
        }
    });
}

function getPick(id,type)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL + 'index.php/Welcome/getPick/',
        data: {id: id,type:type},
        dataType: 'json',
        success: function (res) {
            if (res.response == 1) {
                location.reload();
            }
        }
    });
}

function validReplyForm()
{
    var  flag = 0; var img =0 ;
    var comment = $('#comment').val();
    var attachment = $('input[name="attachment[]"]');

    $('#reply_frm input,textarea,select').removeClass('error');

    if(comment=='' || comment==0){
        $('#comment').addClass('error'); flag=1;
    }

    attachment.each(function(){ console.log(this); console.log($(this));
        if(this.value!=''){
            //if(!this.value.match(/(?:png|PNG|jpg|jpeg|gif|GIF|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX)$/)){
            if(this.value.match(/(?:exe|:EXE)$/)){
                img = 1;
                $(this).replaceWith('<input name="attachment[]" id="attachment" type="file">');
            }
        }
    });

    if(img==1){
        alert('Invalid file format.');
        return false;
    }

    if( flag==0) {
        return true;
    }
    else{
        return false;
    }

}

function validForumForm()
{
    var  flag = 0; var img = 0;
    var title = $('#title').val();
    var des = $('#description').val();
    var attachment = $('input[name="attachment[]"]');

    $('#reply_frm input,textarea,select').removeClass('error');

    if(title=='' || title==0){
        $('#title').addClass('error'); flag=1;
    }
    if(des=='' || des==0){
            $('#description').addClass('error'); flag=1;
    }

    attachment.each(function(){ console.log(this); console.log($(this));
        if(this.value!=''){
            //if(!this.value.match(/(?:png|PNG|jpg|jpeg|gif|GIF|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX)$/)){
            if(this.value.match(/(?:exe|:EXE)$/)){
                img = 1;
                $(this).replaceWith('<input name="attachment[]" id="attachment" type="file">');
            }
        }
    });

    if(img==1){
        alert('Invalid file format.');
        return false;
    }

    if( flag==0) {
        return true;
    }
    else{
        return false;
    }

}

function getCloseConPopup(txt,type,id)
{
    //$('#close-con #myModalLabel4').text(txt);
    $('input[name="ref_type"]').val(type);
    $('input[name="ref_id"]').val(id);    
}

function addRating()
{
    if($('#cur_rating').val()==''){ alert('Please give rating'); }
    else{
        $('#close-consult').submit();
    }
}

function deletePartner(e)
{
    //console.log(e);
    //console.log($(e));
    $(e).parent().parent().remove();
}

function addPartner()
{
    var html = '<div><section style="padding-left: 0px;" class="col col-6"><label for="date" class="input"><input type="text" placeholder="'+PARTNER_NAME+'" id="partner_name[]" name="partner_name[]" value=""></label></section>';
    html+='<section class="col col-5"><label for="date" class="input"><input type="text" placeholder="'+PARTNER_ID+'" id="partner_id[]" name="partner_id[]" value="" class="form-control"></label></section>';
    html+='<section class="col col-1"><input type="button" onclick="deletePartner(this);" class="btn" name="" value="X"></section></div>';
    $('#more-partners').append(html);
}

function getModule(type,id)
{
    $('#content').html('');
    var html = '<table class="view-module">';
    var html1 = '<table class="view-module table table-bordered"><tr><th>'+PARTNER_NAME+'</th><th>'+PARTNER_ID+'</th></tr>';
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL + 'index.php/Welcome/getContent/',
        data: {ref_id: id,ref_type:type},
        dataType: 'json',
        success: function (res) {
            if (res.response == 1) {
                var data = res.data;
                if(type=='consultation')
                {
                    html+='<tr><td class="right">User : </td><td > '+data[0].user_name+'</td></tr>';
                    html+='<tr><td class="right">Consultation type : </td><td > '+data[0].con_type+'</td></tr>';
                    html+='<tr><td class="right">Lawyer : </td><td > '+data[0].lawyer_name+'</td></tr>';
                    /*html+='<tr><td class="right">Experience : </td><td > '+data[0].experience+'</td></tr>';*/
                    html+='<tr><td class="right">Did you complain : </td><td > '+data[0].complain+'</td></tr>';
                    /*html+='<tr><td class="right">Date : </td><td > '+data[0].con_date+'</td></tr>';*/
                    html+='<tr><td class="right">Subject : </td><td > '+data[0].subject+'</td></tr>';
                    html+='<tr><td class="right">Description : </td><td style="width:400px;text-align: justify"> '+data[0].description+'</td></tr>';
                    if(data[0].attachment.length>0){
                        for(var s=0;s<data[0].attachment.length;s++) {
                            html += '<tr><td class="right">Attachment : </td><td > <a target="_blank" href="' + data[0].attachment[s].attachment + '"><img alt="" src="'+BASE_URL+'assets/img/attachment.png" class="mCS_img_loaded"></a></td></tr>';
                        }
                    }
                }
                else if(type=='contract')
                {
                    html+='<tr><td class="right">User : </td><td > '+data[0].user_name+'</td></tr>';
                    html+='<tr><td class="right">Lawyer : </td><td > '+data[0].lawyer_name+'</td></tr>';
                    html+='<tr><td class="right">Experience : </td><td > '+data[0].experience+'</td></tr>';
                    html+='<tr><td class="right">Subject : </td><td > '+data[0].subject+'</td></tr>';
                    html+='<tr><td class="right">Description : </td><td style="width;400px;text-align: justify"> '+data[0].description+'</td></tr>';
                    if(data[0].attachment.length>0){
                        for(var s=0;s<data[0].attachment.length;s++) {
                            html += '<tr><td class="right">Attachment : </td><td > <a target="_blank" href="' + data[0].attachment[s].attachment + '"><img alt="" src="http://localhost/law/assets/img/attachment.png" class="mCS_img_loaded"></a></td></tr>';
                        }
                    }
                }
                else if(type=='company')
                {
                    html+='<tr><td class="right">User : </td><td > '+data[0].user_name+'</td></tr>';
                    html+='<tr><td class="right">Lawyer : </td><td > '+data[0].lawyer_name+'</td></tr>';
                    html+='<tr><td class="right">Experience : </td><td > '+data[0].experience+'</td></tr>';
                    html+='<tr><td class="right">Subject : </td><td > '+data[0].subject+'</td></tr>';
                    html+='<tr><td class="right">Description : </td><td style="width;400px;text-align: justify"> '+data[0].description+'</td></tr>';

                    if(data[0].attachment.length>0){
                        for(var s=0;s<data[0].attachment.length;s++) {
                            html += '<tr><td class="right">Attachment : </td><td > <a target="_blank" href="' + data[0].attachment[s].attachment + '"><img alt="" src="http://localhost/law/assets/img/attachment.png" class="mCS_img_loaded"></a></td></tr>';
                        }
                    }

                    for(var s=0;s<data.length;s++)
                    {
                        html1+='<tr><td>'+data[s].partner_name+'</td><td>'+data[s].partner_id+'</td></tr>';
                    }
                }

                else if(type=='appeal')
                {
                    html+='<tr><td class="right">User : </td><td > '+data[0].user_name+'</td></tr>';
                    html+='<tr><td class="right">Lawyer : </td><td > '+data[0].lawyer_name+'</td></tr>';
                    html+='<tr><td class="right">Appeal Type : </td><td > '+data[0].appeal_type+'</td></tr>';
                    html+='<tr><td class="right">Experience : </td><td > '+data[0].experience+'</td></tr>';
                    html+='<tr><td class="right">Subject : </td><td > '+data[0].subject+'</td></tr>';
                    html+='<tr><td class="right">Description : </td><td style="width;400px;text-align: justify"> '+data[0].description+'</td></tr>';

                    if(data[0].attachment.length>0){
                        for(var s=0;s<data[0].attachment.length;s++) {
                            html += '<tr><td class="right">Attachment : </td><td > <a target="_blank" href="' + data[0].attachment[s].attachment + '"><img alt="" src="http://localhost/law/assets/img/attachment.png" class="mCS_img_loaded"></a></td></tr>';
                        }
                    }

                    for(var s=0;s<data.length;s++)
                    {
                        html1+='<tr><td>'+data[s].partner_name+'</td><td>'+data[s].partner_id+'</td></tr>';
                    }
                }

                html+='</table>';
                html1+='</table>';
                $('#content').html(html);
                if(type=='company')
                    $('#content').append(html1);
            }
        }
    });
}

function getSelectLanguage(language_id,element)
{
    $('.languages li').removeClass('active');
    $(element).addClass('active');

    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL + 'index.php/Welcome/getSelectLanguage/',
        data: {language_id: language_id},
        dataType: 'json',
        success: function (res) {
            if (res.response == 1) {
                location.reload();
            }
        }
    });
}

function getContent(menu_id)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL + 'index.php/Welcome/getArticleContent/',
        data: {menu_id: menu_id},
        dataType: 'json',
        success: function (res) {
            if (res.response == 1) {
                $('#dynamic_content').html(res.data);



                LayerSlider.initLayerSlider();
                StyleSwitcher.initStyleSwitcher();
                OwlCarousel.initOwlCarousel();
                OwlRecentWorks.initOwlRecentWorksV2();

                $(".team-showcase-carousel").flexCarousel({
                    responsiveMode:"itemWidthRange",
                    itemWidthRange:[180, 180]
                });


                $(".logo-showcase-gray").flexCarousel({
                    showItems:5,
                    responsiveMode:"itemWidthRange",
                    itemWidthRange:[200, 210],
                    interval:3000,
                    autoPlay:true,
                    pagination:false
                });

                $('input[type="radio"]').click(function(){
                    if($(this).attr("value")=="3"){
                        $(".box").not(".user").hide();
                        $(".user").show();
                        $('.user_type_id').val($(this).attr("value"));
                    }
                    if($(this).attr("value")=="2"){
                        $(".box").not(".lawyer").hide();
                        $(".lawyer").show();
                        $('.user_type_id').val($(this).attr("value"));
                    }
                    if($(this).attr("value")=="blue"){
                        $(".box").not(".blue").hide();
                        $(".blue").show();
                    }
                });

                $('#date').datepicker({
                    dateFormat: 'dd-mm-yy',
                    prevText: '<i class="fa fa-angle-left"></i>',
                    nextText: '<i class="fa fa-angle-right"></i>'
                });

                //rating js initialization
                $('.basic').jRating({
                    step:true,
                    length : 5
                });

                $('#dynamic_content').css('padding-top','20px');

            }
        }
    });
}

function getAddBrowse()
{
    var html = '<section>'+
                '<label class="">'+
                '<input type="file" id="attachment" name="attachment[]">'+
                '</label>'+
                '<input type="button" value="'+DELETE+'" id="attach-btn" onclick="$(this).parent().remove();" class="btn">'+
                '</section>';
    $('#attach_div').append(html);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function deleteAttachments(e,id)
{
    $(e).parent().remove();
    $('#deleted_attachments').append('<input type="hidden" name="delete_attach[]" value="'+id+'">');
}

$("#lawyer").change(function(){
    $('#l-exp').text($('option:selected', this).attr('data-exp'));
});

function getUser(user_id)
{
    var html = '';
    $.ajax({
        async: true,
        type: 'POST',
        url: BASE_URL + 'index.php/Welcome/getUser/',
        data: {user_id: user_id},
        dataType: 'json',
        success: function (res) {
            if (res.response == 1) {
                var data = res.data;
                html+='<tr><td class="right">First Name : </td><td > '+data[0].first_name+'</td></tr>';
                html+='<tr><td class="right">Last Name : </td><td > '+data[0].last_name+'</td></tr>';
                html+='<tr><td class="right">Father Name : </td><td > '+data[0].father_name+'</td></tr>';
                html+='<tr><td class="right">Email : </td><td > '+data[0].email+'</td></tr>';
                html+='<tr><td class="right">User Name : </td><td > '+data[0].username+'</td></tr>';
                html+='<tr><td class="right">Gender : </td><td > '+data[0].gender+'</td></tr>';
                html+='<tr><td class="right">Mobile Number : </td><td > '+data[0].mobile_number+'</td></tr>';
                html+='<tr><td class="right">Speciality : </td><td> '+data[0].speciality+'</td></tr>';
                $('#content').html(html);
            }
        }
    });
}