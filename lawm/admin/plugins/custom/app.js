/*My Custom validations*/
$(function () {
    $('#category_ddl').on('change', function() {
        var table = jQuery('#table').DataTable();
        table.draw();
    });
}(jQuery));


function getUsers(type)
{
    var user_type = type;
    $('#table').dataTable({
        "processing": true,
        "bProcessing": true,
        "serverSide": true,
        "bPaginate":true,
        "aaSorting": [],
        "ajax": {
            "url": ADMIN_BASE_URL+'index.php?welcome/getUsers/'+type,
            "type": "POST",
            "data": function ( d ) {
                d.acolumns="id_user";
                d.my_order = "id_user";
                d.sort="desc";
            }
        },
        "aoColumnDefs": [
            {
                "aTargets": [8],
                "mData": null,
                "mRender": function (data, type, full) {

                    if(full[8]==0) return "Inactive";
                    else return "Active";
                }
            },
            {
                "aTargets": [9],
                "mData": null,
                "mRender": function (data, type, full) 
                {

                    if(user_type==2) 
                    {
                        return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                            '<a title="Edit" data-toggle="modal" data-target="#myModal" class="edit" onclick="EditUser(\'' + full[9] + '\')"><span class="circle"><i class="fa fa fa-pencil"></i></span></a></a>' +
                            '</div>';
                    }
                    else 
                    {
                        return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                            '<a title="Edit" data-toggle="modal" data-target="#myModal" class="edit" onclick="EditUser(\'' + full[9] + '\')"><span class="circle"><i class="fa fa fa-pencil"></i></span></a></a>' +
                            '</div>';
                    }
                }
            }
        ]
    });
}

function EditUser(user_id)
{
    var html = '';
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php?welcome/getUserDetails/'+user_id,
        data: '',
        dataType: 'json',
        success:function(res)
        {
            var data = res.data;
            if(data[0].user_type_id==3)
            {
                
                $('#first_name').val(data[0].first_name);
                $('#last_name').val(data[0].last_name);
                $('#father_name').val(data[0].father_name);
                $('#email').val(data[0].email);
                $('#username').val(data[0].username);
                $('#gender').val(data[0].gender);
                $('#mobile_number').val(data[0].mobile_number);
                $('#country_id').val(data[0].country_id);
                if(data[0].user_image)
                {
                    $('#user_image_div').css('display','block');
                    $('#user_image_tag').attr('src',data[0].user_image);
                }
                else
                {
                    $('#user_image_div').css('display','none');
                }
                $('#user_status').val(data[0].user_status);
                $('#user_id').val(data[0].id_user);
                

            }
            else if(data[0].user_type_id==2)
            {                
        
                $('#first_name').val(data[0].first_name);
                $('#last_name').val(data[0].last_name);
                $('#father_name').val(data[0].father_name);
                $('#email').val(data[0].email);
                $('#username').val(data[0].username);
                $('#gender').val(data[0].gender);
                $('#mobile_number').val(data[0].mobile_number);
                $('#country_id').val(data[0].country_id);
                if(data[0].user_image){
                    $('#user_image_div').css('display','block');
                    $('#user_image_tag').attr('src',data[0].user_image);
                }
                else{
                    $('#user_image_div').css('display','none');
                }
                $('#experience').val(data[0].experience);
                $('#speciality').val(data[0].speciality_id);
                $('#user_status').val(data[0].user_status);
                $('#user_id').val(data[0].id_user);
                var rating = 0;
                if(data[0].user_rating){ rating = data[0].user_rating; }
                $('#rating').text(rating);

            }

        }
    });
}

function changeUserStatus(user_id,status)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php?welcome/changeUserStatus/',
        data: {user_status:status,id_user:user_id},
        dataType: 'json',
        success:function(res)
        {
            location.reload();
        }
    });
}

function getForumList()
{
    $('#table').dataTable({
        "processing": true,
        "bProcessing": true,
        "serverSide": true,
        "bPaginate":true,
        "aaSorting": [],
        "ajax": {
            "url": ADMIN_BASE_URL+'index.php?welcome/getForumList/',
            "type": "POST",
            "data": function ( d ) {
                d.acolumns="id_forum";
                d.my_order = "id_forum";
                d.sort="desc";
            }
        },
        "aoColumnDefs": [
            {
                "aTargets": [3],
                "mData": null,
                "mRender": function (data, type, full) {

                    if(full[3]==0){ return "Inactive"; }
                    else{ return "Active"; }
                }
            },
            {
                "aTargets": [4],
                "mData": null,
                "mRender": function (data, type, full) {

                    return full[4];
                }
            },
            {
                "aTargets": [5],
                "mData": null,
                "mRender": function (data, type, full) {
                    if(full[3]==0) {
                        return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                            '<a  title="Active" class="edit" onclick="changeForumStatus(\'' + full[5] + '\',1)"><span class="circle"><i class="fa fa-check-square-o"></i></span></a></a>' +
                            '<a style="padding-left: 10px;" title="delete" class="edit" onclick="deleteForum(\'' + full[5] + '\')"><span class="circle"><i class="fa fa-trash-o"></i></span></a></a>' +
                            '</div>';
                    }
                    else{
                        return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                            '<a  title="Inactive" class="edit" onclick="changeForumStatus(\'' + full[5] + '\',0)"><span class="circle"><i class="fa fa-minus-square-o"></i></span></a></a>' +
                            '<a style="padding-left: 10px;" title="delete" class="edit" onclick="deleteForum(\'' + full[5] + '\')"><span class="circle"><i class="fa fa-trash-o"></i></span></a></a>' +
                            '</div>';
                    }
                }
            }
        ]
    });
}

function deleteForum(id)
{
    var r = confirm("Are you sure you want to delete?");
    if (r == true) {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/deleteForum/',
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                var table = $('#table').DataTable();
                table.draw();
            }
        });
    }
}

function changeForumStatus(id,status)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL + 'index.php?welcome/changeForumStatus/',
        data: {id_forum: id,status:status},
        dataType: 'json',
        success: function (res) {
            var table = $('#table').DataTable();
            table.draw();
        }
    });
}

function getLanguage()
{
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php?welcome/getLanguage/',
        data: {},
        dataType: 'json',
        success:function(res)
        {
            JSON = res.data;
        }
    });
}

function getParentMenu()
{
    var html='<option value="0">Select Parent Menu</option>';
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php?welcome/getParentMenu/',
        data: {},
        dataType: 'json',
        success:function(res)
        {
            if(res.response==1)
            {
                for(var s=0;s<res.data.length;s++) {
                    html+= '<option value="' + res[s].id_menu + '">' + res[s].menu_title + '</option>';
                }
            }

            $('#parent_id').html(html);
        }
    });
}


function getAddMenu()
{
    var language = JSON;
    var html = '';
    html+='<ul class="nav nav-tabs">';
    for(var s=0;s<language.length;s++)
    {
        html+='<li class="';
        if(s==0){ html+=' active '; }
        html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
    }
    html+='</ul>';
    html+='<div class="tab-content">';
    for(s=0;s<language.length;s++)
    {
        html+='<div class="tab-pane';
        if(s==0){ html+=' active'; }
        html+='" id="tab_'+s+'"><div class="form-group" id="">'+
              '<label>Menu</label>'+
              '<input type="text" placeholder="Enter Menu" name="'+language[s].id_language+'_name" id="'+language[s].id_language+'_name" class="form-control" required>'+
              '<span style="color: green;font-size: 12px;"></span>'+
              '</div>'+
                '<div class="form-group" id="">'+
                '<label>Menu Link</label>'+
                '<input type="text" placeholder="Enter Link" name="'+language[s].id_language+'_link" id="'+language[s].id_language+'_link" class="form-control" required>'+
                '<span style="color: green;font-size: 12px;"></span>'+
                '</div>'+
              '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
    }
    html+='</div>';
    $('#myModalLabel').text('Add Menu');
    $('#model-body-c').html(html);
    $('#menu_status_div').css('display','none');
    $('#action').val('addMenu');
}

function getAddCategory()
{
    var language = JSON;
    var html = '';

    html+='<ul class="nav nav-tabs">';
    for(var s=0;s<language.length;s++)
    {
        html+='<li class="';
        if(s==0){ html+=' active '; }
        html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
    }
    html+='</ul>';
    html+='<div class="tab-content">';


    for(var s=0;s<language.length;s++)
    {

        html+='<div class="tab-pane';
        if(s==0){ html+=' active'; }
        html+='" id="tab_'+s+'"><div class="form-group" id="">'+
            '<label>Category</label>'+
            '<input type="text" placeholder="Enter Title" name="'+language[s].id_language+'_name" id="'+language[s].id_language+'_name" class="form-control" required>'+
            '<span style="color: green;font-size: 12px;"></span>'+
            '</div>'+
            '<div class="form-group" id="">'+
            '<label>category Link</label>'+
            '<input type="text" placeholder="Enter Link" name="'+language[s].id_language+'_link" id="'+language[s].id_language+'_link" class="form-control" required>'+
            '<span style="color: green;font-size: 12px;"></span>'+
            '</div>'+
            '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
    }
    html+='</div>';

    $('#myModalLabel').text('Add Category');
    $('#model-body-c').html(html);
    $('#category_status_div').css('display','none');
    $('#action').val('addCategory');
}

function getAddArticle()
{
    var language = JSON;
    var html = '';

    html+='<ul class="nav nav-tabs">';
    for(var s=0;s<language.length;s++)
    {
        html+='<li class="';
        if(s==0){ html+=' active '; }
        html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
    }
    html+='</ul>';
    html+='<div class="tab-content">';

    for( s=0;s<language.length;s++)
    {
        html+='<div class="tab-pane';
        if(s==0){ html+=' active'; }
        html+='" id="tab_'+s+'"><div class="form-group" id="">'+
            '<label>Article Title</label>'+
            '<input type="text" placeholder="Enter Title" name="'+language[s].id_language+'_title" id="'+language[s].id_language+'_title" class="form-control" required>'+
            '<span style="color: green;font-size: 12px;"></span>'+
            '</div>'+
            '<div class="form-group" id="">'+
            '<label>Article Content</label>'+
            '<textarea name="'+language[s].id_language+'_content" id="'+language[s].id_language+'_content" class="form-control editor1" required></textarea>'+
            /*'<input type="text" placeholder="content" name="'+language[s].id_language+'_content" id="'+'+language[s].id_language+'+'" class="form-control">'+*/
            '<span style="color: green;font-size: 12px;"></span>'+
            '</div>'+
            '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
    }
    html+='</div>';

    $('#myModalLabel').text('Add Article');
    $('#model-body-c').html(html);
    $('#action').val('addArticle');

    for(var s=0;s<language.length;s++){
        CKEDITOR.replace(language[s].id_language+'_content');
    }

}

function getAddService()
{
    var language = JSON;
    var html = '';
    html+='<ul class="nav nav-tabs">';
    for(var s=0;s<language.length;s++)
    {
        html+='<li class="';
        if(s==0){ html+=' active '; }
        html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
    }
    html+='</ul>';
    html+='<div class="tab-content">';
    for(s=0;s<language.length;s++)
    {
        html+='<div class="tab-pane';
        if(s==0){ html+=' active'; }
        html+='" id="tab_'+s+'"><div class="form-group" id="">'+
            '<label>Service Name</label>'+
            '<input type="text" placeholder="Enter Service" name="'+language[s].id_language+'_name" id="'+language[s].id_language+'_name" class="form-control" required>'+
            '<span style="color: green;font-size: 12px;"></span>'+
            '</div>'+
            '<div class="form-group" id="">'+
        '<label>Color Code</label>'+
        '<input type="text" placeholder="Enter Color Code" name="'+language[s].id_language+'_color_code" id="'+language[s].id_language+'_color_code" class="form-control" required>'+
        '<span style="color: green;font-size: 12px;"></span>'+
        '</div>'+
        '<div class="form-group" id="">'+
        '<label>Service Icon</label>'+
        '<input type="text" placeholder="Enter Icon" name="'+language[s].id_language+'_icon" id="'+language[s].id_language+'_icon" class="form-control" required>'+
        '<span style="color: green;font-size: 12px;"></span>'+
        '</div>'+
            '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
    }
    html+='</div>';
    $('#myModalLabel').text('Add Service');
    $('#model-body-c').html(html);
    $('#menu_status_div').css('display','none');
    $('#action').val('addService');
}

function validMenu(form)
{
    var language = JSON;
    var flag=0;
    for(var s=0;s<language.length;s++){
        $('#'+language[s].id_language+'_name').removeClass('err');
        $('#'+language[s].id_language+'_link').removeClass('err');

        if($('#'+language[s].id_language+'_name').val()==''){
            $('#'+language[s].id_language+'_name').addClass('err');
            flag++;
        }
        /*if($('#'+language[s].id_language+'_link').val()==''){
            $('#'+language[s].id_language+'_link').addClass('err');
            flag++;
        }*/
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function validCategory(form)
{
    var language = JSON;
    var flag=0;


    $('#menu_flag_id').removeClass('err');
    if($('#menu_flag_id').val()==0){
        $('#menu_flag_id').addClass('err');
        flag=1;
    }

    for(var s=0;s<language.length;s++){
        $('#'+language[s].id_language+'_name').removeClass('err');
        $('#'+language[s].id_language+'_link').removeClass('err');

        if($('#'+language[s].id_language+'_name').val()==''){
            $('#'+language[s].id_language+'_name').addClass('err');
            flag++;
        }
        if($('#'+language[s].id_language+'_link').val()==''){
            $('#'+language[s].id_language+'_link').addClass('err');
            flag++;
        }
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function validArticle(form)
{
    var language = JSON;
    var flag=0;


    $('#menu_id').removeClass('err');
    if($('#menu_id').val()==0){
        $('#menu_id').addClass('err');
        flag=1;
    }

    for(var s=0;s<language.length;s++){
        $('#'+language[s].id_language+'_title').removeClass('err');

        if($('#'+language[s].id_language+'_title').val()==''){
            $('#'+language[s].id_language+'_title').addClass('err');
            flag++;
        }
        if($('#'+language[s].id_language+'_content').val()==''){
            flag++;
        }
    }

    if(flag==0){ return true; }
    else{ alert('Please fill all fields'); return false; }
}

function validService(form)
{
    var language = JSON;
    var flag=0;
    for(var s=0;s<language.length;s++){
        $('#'+language[s].id_language+'_name').removeClass('err');

        if($('#'+language[s].id_language+'_name').val()==''){
            $('#'+language[s].id_language+'_name').addClass('err');
            flag++;
        }
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function validForum(form)
{
    var flag=0; var img = 0;
    var title = $('#title').val();
    var des = $('#description').val();
    var attachment = $('input[name="attachment[]"]');

    if(title==''){
        $('#title').addClass('err');
        flag++;
    }
    if(des==''){
        $('#description').addClass('err');
        flag++;
    }

    attachment.each(function(){
        if(this.value!=''){
            //if(!this.value.match(/(?:png|PNG|jpg|jpeg|gif|GIF|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX)$/)){
            if(this.value.match(/(?:exe|:EXE)$/)){
                img = 1; flag = 1;
                $(this).replaceWith('<input style="float: left" type="file" name="attachment[]" id="attachment[]">');
            }
        }
    });

    if(img==1){
        alert('Invalid file format.');
        return false;
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function editMenu(menu_id)
{
    var params = {'menu_id':menu_id};
    var menu_title = ''; var menu_link = ''; var status=1; var order = 0; var parent = 0;
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php/welcome/getMenuByFlag',
        data: params,
        /*dataType: 'json',*/
        success:function(res){
            var language = JSON;
            var html = '';
            res = eval(res);
            order = res[0].order;
            parent = res[0].parent_id;
            html+='<ul class="nav nav-tabs">';
            for(var s=0;s<language.length;s++)
            {
                html+='<li class="';
                if(s==0){ html+=' active '; }
                html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
            }
            html+='</ul>';
            html+='<div class="tab-content">';

            for(var s=0;s<language.length;s++)
            {
                for(var r=0;r<res.length;r++)
                {
                    if(language[s].id_language==res[r].language_id){
                        menu_title = res[r].menu_title;
                        menu_link = res[r].menu_link;
                        status = res[r].menu_status;
                    }
                }
                html+='<div class="tab-pane';
                if(s==0){ html+=' active'; }
                html+='" id="tab_'+s+'"><div class="form-group" id="">'+
                    '<label>Menu</label>'+
                    '<input type="text" placeholder="Enter Menu" name="'+language[s].id_language+'_name" id="'+language[s].id_language+'_name" value="'+menu_title+'" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<div class="form-group" id="">'+
                    '<label>Menu Link</label>'+
                    '<input type="text" placeholder="Enter Link" name="'+language[s].id_language+'_link" id="'+language[s].id_language+'_link" value="'+menu_link+'" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
            }

            html+='</div>';
            $('#myModalLabel').text('Edit Menu');
            $('#model-body-c').html(html);
            $('#menu_status_div').css('display','block');
            $('#action').val('updateMenu');
            $('#order').val(order);
            $('#menu_id').val(menu_id);
            $('#parent_id').val(parent);
            $('#menu_status').val(status);
        }
    });
}

function editCategory(category_flag)
{
    var params = {'category_flag':category_flag};
    var menu_title = ''; var menu_link = ''; var status=0;
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php/welcome/getCategoryByFlag',
        data: params,
        /*dataType: 'json',*/
        success:function(res){
            var language = JSON;
            var html = '';
            res = eval(res);

            html+='<ul class="nav nav-tabs">';
            for(var s=0;s<language.length;s++)
            {
                html+='<li class="';
                if(s==0){ html+=' active '; }
                html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
            }
            html+='</ul>';
            html+='<div class="tab-content">';

            for(var s=0;s<language.length;s++)
            {
                for(var r=0;r<res.length;r++)
                {
                    if(language[s].id_language==res[r].language_id){
                        menu_title = res[r].category_title;
                        menu_link = res[r].category_link;
                        status = res[r].status;
                    }
                }
                html+='<div class="tab-pane';
                if(s==0){ html+=' active'; }
                html+='" id="tab_'+s+'"><div class="form-group" id="">'+
                    '<label>Category</label>'+
                    '<input type="text" placeholder="Enter Menu" name="'+language[s].id_language+'_name" id="'+language[s].id_language+'_name" value="'+menu_title+'" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<div class="form-group" id="">'+
                    '<label>Category Link</label>'+
                    '<input type="text" placeholder="Enter Link" name="'+language[s].id_language+'_link" id="'+language[s].id_language+'_link" value="'+menu_link+'" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
            }
            html+='</div>';

            $('#myModalLabel').text('Edit Category');
            $('#model-body-c').html(html);
            $('#category_status_div').css('display','block');
            $('#status').val(status);
            $('#action').val('updateCategory');
            $('#category_flag').val(category_flag);
        }
    });
}

function editArticle(article_id)
{
    var params = {'article_id':article_id};
    var article_title = ''; var content = ''; var order = 0;
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php/welcome/getArticleById',
        data: params,
        /*dataType: 'json',*/
        success:function(res){
            var language = JSON;
            var html = '';
            res = eval(res);
            order = res[0].order;
            html+='<ul class="nav nav-tabs">';
            for(var s=0;s<language.length;s++)
            {
                html+='<li class="';
                if(s==0){ html+=' active '; }
                html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
            }
            html+='</ul>';
            html+='<div class="tab-content">';

            for(var s=0;s<language.length;s++)
            {
                for(var r=0;r<res.length;r++)
                {
                    if(language[s].id_language==res[r].language_id){
                        article_title = res[r].article_title;
                        content = res[r].content;
                    }
                }
                html+='<div class="tab-pane';
                if(s==0){ html+=' active'; }
                html+='" id="tab_'+s+'"><div class="form-group" id="">'+
                    '<label>Article Title('+language[s].language+')</label>'+
                    '<input type="text" placeholder="Enter Title" value="'+article_title+'" name="'+language[s].id_language+'_title" id="'+language[s].id_language+'_title" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<div class="form-group" id="">'+
                    '<label>Article Content('+language[s].language+')</label>'+
                    '<textarea name="'+language[s].id_language+'_content" id="'+language[s].id_language+'_content" class="form-control editor1" >'+content+'</textarea>'+
                        /*'<input type="text" placeholder="content" name="'+language[s].id_language+'_content" id="'+'+language[s].id_language+'+'" class="form-control">'+*/
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
            }
            html+='</div>';

            $('#myModalLabel').text('Edit Article');
            $('#model-body-c').html(html);
            $('#action').val('updateArticle');
            $('#article_id').val(article_id);
            $('#menu_id').val(res[0].menu_id);
            $('#order').val(order);

            for(var s=0;s<language.length;s++){
                CKEDITOR.replace(language[s].id_language+'_content');
            }
        }
    });
}

function editService(service_flag)
{
    var params = {'service_flag':service_flag};
    var service_title = '';  var status=1; var color_code = ''; var icon = '';
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php/welcome/getServiceByFlag',
        data: params,
        /*dataType: 'json',*/
        success:function(res){
            var language = JSON;
            var html = '';
            res = eval(res);


            html+='<ul class="nav nav-tabs">';
            for(var s=0;s<language.length;s++)
            {
                html+='<li class="';
                if(s==0){ html+=' active '; }
                html+='"><a href="#tab_'+s+'" data-toggle="tab">'+language[s].language+'</a></li>';
            }
            html+='</ul>';
            html+='<div class="tab-content">';

            for(var s=0;s<language.length;s++)
            {
                for(var r=0;r<res.length;r++)
                {
                    if(language[s].id_language==res[r].language_id){
                        service_title = res[r].service_title;
                        status = res[r].service_status;
                        color_code = res[r].color_code;
                        icon = res[r].icon;
                    }
                }
                html+='<div class="tab-pane';
                if(s==0){ html+=' active'; }
                html+='" id="tab_'+s+'"><div class="form-group" id="">'+
                    '<label>Service Title</label>'+
                    '<input type="text" placeholder="Enter service" name="'+language[s].id_language+'_name" id="'+language[s].id_language+'_name" value="'+service_title+'" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<div class="form-group" id="">'+
                    '<label>Color Code</label>'+
                    '<input type="text" placeholder="Enter Color Code" name="'+language[s].id_language+'_color_code" id="'+language[s].id_language+'_color_code" value="'+color_code+'" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<div class="form-group" id="">'+
                    '<label>Service Icon</label>'+
                    '<input type="text" placeholder="Enter Icon" name="'+language[s].id_language+'_icon" id="'+language[s].id_language+'_icon" value="'+icon+'" class="form-control" required>'+
                    '<span style="color: green;font-size: 12px;"></span>'+
                    '</div>'+
                    '<input type="hidden" name="lan[]" value="'+language[s].id_language+'"></div>';
            }

            html+='</div>';
            $('#myModalLabel').text('Edit Service');
            $('#model-body-c').html(html);
            $('#menu_status_div').css('display','block');
            $('#action').val('updateService');
            $('#service_flag').val(service_flag);
            $('#service_status').val(status);
        }
    });
}

function getServiceData(id,type)
{
    var params = {'type':type,'id':id};
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php/welcome/getServiceData',
        data: params,
        /*dataType: 'json',*/
        success:function(res){
            var html = ''; var name = '';
            res = eval(res);
            $('#c-case_id').text(res[0].case_id);
            $('#c-user').text(res[0].user_name);
            $('#c-lawyer').text(res[0].lawyer_name);
            $('#c-exp').text(res[0].lawyer_experience);
            if(type=='consultation'){
                $('#c-type').text(res[0].con_type);
                $('#c-complain').text(res[0].complain);
                $('#c-date').text(res[0].date);
            }
            else if(type=='appeal'){
                $('#c-type').text(res[0].appeal_type);
            }
            else if(type=='company'){
                for(var s=0;s<res.length;s++){
                    if(s!=0){ name+=', '; }
                    if(res[s].partner_name!=null) name+= res[s].partner_name;
                }

                if(name=='' || name==null){ name = '---'; }
                $('#c-partner').text(name);
            }

            $('#c-subject').text(res[0].subject);
            $('#c-des').text(res[0].description);
            if(res[0].attachments!=''){ var at = '';
                for( var r=0;r<res[0].attachments.length;r++){
                    if(r>0){ at+=', '; }
                    at+='<a target="_blank" href="'+res[0].attachments[r].attachment+'">Attachment'+parseInt(r+1)+'</a>';
                }
                $('#c-attachment').html(at);
            }

                //$('#c-attachment').html('<a target="_blank" href="'+res[0].attachment+'">Attachment</a>');
            else
                $('#c-attachment').text('---');
            if(res[0].status!='pending'){
                $('#lawyer_id').css('display','none');
                $('#s-btn').css('display','none');
                $('#lawyer_id_label').css('display','inline');
            }
            else{
                $('#lawyer_id_label').css('display','none');
                $('#lawyer_id').css('display','block');
                $('#s-btn').css('display','block');
                $('#lawyer_id').val(res[0].lawyer_id);
                $('#id').val(id);
            }
        }
    });
}

function getLawyerList()
{
    var html = '';
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL+'index.php/welcome/getLawyerList',
        data: '',
        /*dataType: 'json',*/
        success:function(res){
            var html = '';
            res = eval(res);
            for(var s=0;s<res.length;s++)
            {
                html+='<option value="'+res[s].id_user+'">'+res[s].username+'</option>'
            }
            $('#lawyer_id').html(html)
        }
    });
}

function getSpecialityList()
{
    $('#table').dataTable({
        "processing": true,
        "bProcessing": true,
        "serverSide": true,
        "bPaginate":true,
        "aaSorting": [],
        "ajax": {
            "url": ADMIN_BASE_URL+'index.php?welcome/getSpecialityList/',
            "type": "POST",
            "data": function ( d ) {
                d.acolumns="id_speciality";
                d.my_order = "id_speciality";
                d.sort="desc";
            }
        },
        "aoColumnDefs": [
            {
                "aTargets": [1],
                "mData": null,
                "mRender": function (data, type, full) {

                        return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                            '<a  title="Active" class="edit" data-toggle="modal" data-target="#myModal" onclick="getSpeciality(\'' + full[1] + '\')"><span class="circle"><i class="fa fa-check-square-o"></i></span></a></a>' +
                            '<a style="padding-left: 10px;" title="delete" class="edit" onclick="deleteSpeciality(\'' + full[1] + '\')"><span class="circle"><i class="fa fa-trash-o"></i></span></a></a>' +
                            '</div>';

                }
            }
        ]
    });
}

function deleteSpeciality(id)
{
    var r = confirm("Are you sure you want to delete?");
    if (r == true) {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/deleteSpeciality/',
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                var table = $('#table').DataTable();
                table.draw();
            }
        });
    }
}

function getSpeciality(id)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL + 'index.php?welcome/getSpeciality/',
        data: {id_speciality: id},
        dataType: 'json',
        success: function (res) {
            /*var table = $('#table').DataTable();
            table.draw();*/
            var data = res.data;
            $('#speciality').val(data[0].speciality);
            $('#id_speciality').val(data[0].id_speciality);
        }
    });
}

function validSpeciality(form)
{
    var flag=0;
    var title = $('#speciality').val();

    if(title==''){
        $('#speciality').addClass('err');
        flag++;
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function getConsultationTypeList()
{
    $('#table').dataTable({
        "processing": true,
        "bProcessing": true,
        "serverSide": true,
        "bPaginate":true,
        "aaSorting": [],
        "ajax": {
            "url": ADMIN_BASE_URL+'index.php?welcome/getConsultationTypeList/',
            "type": "POST",
            "data": function ( d ) {
                d.acolumns="id_consultation_type";
                d.my_order = "id_consultation_type";
                d.sort="desc";
            }
        },
        "aoColumnDefs": [
            {
                "aTargets": [1],
                "mData": null,
                "mRender": function (data, type, full) {

                    return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                        '<a  title="Active" class="edit" data-toggle="modal" data-target="#myModal" onclick="getConsultationType(\'' + full[1] + '\')"><span class="circle"><i class="fa fa-check-square-o"></i></span></a></a>' +
                        '<a style="padding-left: 10px;" title="delete" class="edit" onclick="deleteConsultationType(\'' + full[1] + '\')"><span class="circle"><i class="fa fa-trash-o"></i></span></a></a>' +
                        '</div>';

                }
            }
        ]
    });
}

function deleteConsultationType(id)
{
    var r = confirm("Are you sure you want to delete?");
    if (r == true) {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/deleteConsultationType/',
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                var table = $('#table').DataTable();
                table.draw();
            }
        });
    }
}

function getConsultationType(id)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL + 'index.php?welcome/getConsultationType/',
        data: {id_consultation_type: id},
        dataType: 'json',
        success: function (res) {
            /*var table = $('#table').DataTable();
             table.draw();*/
            var data = res.data;
            $('#consultation_type').val(data[0].consultation_type);
            $('#id_consultation_type').val(data[0].id_consultation_type);
        }
    });
}

function validConsultationType(form)
{
    var flag=0;
    var title = $('#consultation_type').val();

    if(title==''){
        $('#consultation_type').addClass('err');
        flag++;
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function getAppealTypeList()
{
    $('#table').dataTable({
        "processing": true,
        "bProcessing": true,
        "serverSide": true,
        "bPaginate":true,
        "aaSorting": [],
        "ajax": {
            "url": ADMIN_BASE_URL+'index.php?welcome/getAppealTypeList/',
            "type": "POST",
            "data": function ( d ) {
                d.acolumns="id_appeal_type";
                d.my_order = "id_appeal_type";
                d.sort="desc";
            }
        },
        "aoColumnDefs": [
            {
                "aTargets": [1],
                "mData": null,
                "mRender": function (data, type, full) {

                    return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                        '<a  title="Active" class="edit" data-toggle="modal" data-target="#myModal" onclick="getAppealType(\'' + full[1] + '\')"><span class="circle"><i class="fa fa-check-square-o"></i></span></a></a>' +
                        '<a style="padding-left: 10px;" title="delete" class="edit" onclick="deleteAppealType(\'' + full[1] + '\')"><span class="circle"><i class="fa fa-trash-o"></i></span></a></a>' +
                        '</div>';

                }
            }
        ]
    });
}

function deleteAppealType(id)
{
    var r = confirm("Are you sure you want to delete?");
    if (r == true) {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/deleteAppealType/',
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                var table = $('#table').DataTable();
                table.draw();
            }
        });
    }
}

function getAppealType(id)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL + 'index.php?welcome/getAppealType/',
        data: {id_appeal_type: id},
        dataType: 'json',
        success: function (res) {
            /*var table = $('#table').DataTable();
             table.draw();*/
            var data = res.data;
            $('#appeal_type').val(data[0].appeal_type);
            $('#id_appeal_type').val(data[0].id_appeal_type);
        }
    });
}

function validAppealType(form)
{
    var flag=0;
    var title = $('#appeal_type').val();

    if(title==''){
        $('#appeal_type').addClass('err');
        flag++;
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function getCountryList()
{
    var html = '';
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL + 'index.php?welcome/getCountryList/',
        data: {},
        dataType: 'json',
        success: function (res) {
            var data = res.data;
            for(var s=0;s<data.length;s++){
                html+='<option value="'+data[s].id_country+'">'+data[s].country_name+'</option>';
            }
            $('#country_id').html(html);
        }
    });
}

function getSpecialityListDrp()
{
    var html = '';
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL + 'index.php?welcome/getSpecialityListDrp/',
        data: {},
        dataType: 'json',
        success: function (res) {
            var data = res.data;
            for(var s=0;s<data.length;s++){
                html+='<option value="'+data[s].id_speciality+'">'+data[s].speciality+'</option>';
            }
            $('#speciality_id').html(html);
        }
    });
}


function validateUser()
{
    var flag = 0;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    var username = $('#username').val();
    var user_id = $('#user_id').val();

    $('#first_name').removeClass('err');
    $('#last_name').removeClass('err');
    $('#email').removeClass('err');
    $('#username').removeClass('err');

    if(first_name==''){
        $('#first_name').addClass('err'); flag=1;
    }
    if(last_name==''){
        $('#last_name').addClass('err'); flag=1;
    }
    if(email==''){
        $('#email').addClass('err'); flag=1;
    }
    else if(!email_reg.test(email)){
        $('#email').addClass('err');
        flag=1;
    }
    if(username==''){
        $('#username').addClass('err'); flag=1;
    }

    if(flag==0)
    {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/checkUser/',
            data: {id_user:user_id,email:email,username:username},
            dataType: 'json',
            success: function (res) 
            {
                if(res.response==1)
                {
                    $('#user_form').submit();
                }
                else{
                    alert(res.data);
                }

            }
        });
    }
}


function validateLawyer()
{
    var flag = 0;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    var username = $('#username').val();
    var user_id = $('#user_id').val();

    $('#first_name').removeClass('err');
    $('#last_name').removeClass('err');
    $('#email').removeClass('err');
    $('#username').removeClass('err');

    if(first_name==''){
        $('#first_name').addClass('err'); flag=1;
    }
    if(last_name==''){
        $('#last_name').addClass('err'); flag=1;
    }
    if(email==''){
        $('#email').addClass('err'); flag=1;
    }
    else if(!email_reg.test(email)){
        $('#email').addClass('err');
        flag=1;
    }
    if(username==''){
        $('#username').addClass('err'); flag=1;
    }

    if(flag==0)
    {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/checkLawyer/',
            data: {id_user:user_id,email:email,username:username},
            dataType: 'json',
            success: function (res) {
                if(res.response==1) {
                    $('#lawyer_form').submit();
                }
                else{
                    alert(res.data);
                }

            }
        });
    }
}

function getLawyerAmountList()
{
    $('#table').dataTable({
        "processing": true,
        "bProcessing": true,
        "serverSide": true,
        "bPaginate":true,
        "aaSorting": [],
        "ajax": {
            "url": ADMIN_BASE_URL+'index.php?welcome/getLawyerAmountList/',
            "type": "POST",
            "data": function ( d ) {
                d.acolumns="id_lawyer_amount";
                d.my_order = "id_lawyer_amount";
                d.sort="desc";
            }
        },
        "aoColumnDefs": [
            {
                "aTargets": [2],
                "mData": null,
                "mRender": function (data, type, full) {

                    return '<div class="mod-more tooltipsample actions" style="cursor: pointer">' +
                        '<a  title="Active" class="edit" data-toggle="modal" data-target="#myModal" onclick="getLawyerAmount(\'' + full[2] + '\')"><span class="circle"><i class="fa fa-check-square-o"></i></span></a></a>' +
                        '<a style="padding-left: 10px;" title="delete" class="edit" onclick="deleteLawyerAmount(\'' + full[2] + '\')"><span class="circle"><i class="fa fa-trash-o"></i></span></a></a>' +
                        '</div>';

                }
            }
        ]
    });
}

function deleteLawyerAmount(id)
{
    var r = confirm("Are you sure you want to delete?");
    if (r == true) {
        $.ajax({
            async: true,
            type: 'POST',
            url: ADMIN_BASE_URL + 'index.php?welcome/deleteLawyerAmount/',
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                var table = $('#table').DataTable();
                table.draw();
            }
        });
    }
}

function getLawyerAmount(id)
{
    $.ajax({
        async: true,
        type: 'POST',
        url: ADMIN_BASE_URL + 'index.php?welcome/getLawyerAmount/',
        data: {id_lawyer_amount: id},
        dataType: 'json',
        success: function (res) {

            var data = res.data;
            $('#experience').val(data[0].experience);
            $('#lawyer_amount').val(data[0].lawyer_amount);
            $('#id_lawyer_amount').val(data[0].id_lawyer_amount);
        }
    });
}

function validLawyerAmount(form)
{
    var flag=0;
    var exp_id = $('#experience').val();
    var amount = $('#lawyer_amount').val();

    if(exp_id=='' || exp_id==0){
        $('#experience').addClass('err');
        flag++;
    }
    if(amount==''){
        $('#lawyer_amount').addClass('err');
        flag++;
    }

    if(flag==0){ return true; }
    else{ return false; }
}

function changePassword()
{
    var flag = 0;
    var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var password_reg = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))/i;
    /*$('#p_user_name').removeClass('error');
     $('#p_email').removeClass('error');*/
    $('#password').removeClass('err');
    $('#confirm_password').removeClass('err');

    /*$('#p_email_err').text('');*/
    $('#password_err').text('');
    $('#confirm_password_err').text('');

    /*var user_name = $('#p_user_name').val();
     var email = $('#p_email').val();*/
    var password = $('#password').val();
    var confirm_passowrd = $('#confirm_password').val();


    if(password==''){
        $('#password').addClass('err');
        flag=1;
    }
    else if(password.length<8){
        $('#password').addClass('err');
        $('#password_err').text('Password must be minimum 8 characters');
        flag=1;
    }
    else if(!password_reg.test(password)){
        $('#password').addClass('err');
        $('#password_err').text('Password must be alphanumeric');
        flag=1;
    }
    if(confirm_passowrd==''){
        $('#confirm_password').addClass('err');
        flag=1;
    }
    else if(password!=confirm_passowrd){
        $('#confirm_password_err').text('Password not match');
        $('#confirm_password').addClass('err');
        flag=1;
    }

    if(flag==0){
        return true;
    }
    else{
        return false;
    }
}

function getExcelDownload(type,params)
{
    var html = '<input type="hidden" name="type" value="'+type+'">';
    $('#excel_download_params').html(html);
    $('#excel_form').submit();
}

