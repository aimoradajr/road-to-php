    </div>
    <!-- /container -->
 
<!-- jQuery library -->
<script src="node_modules/jquery/dist/jquery.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/bootstrap/docs-assets/js/holder.js"></script>
 
<!-- bootbox library -->
<script src="node_modules/bootbox/bootbox.min.js"></script>
 
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
    $('.delete-btn').click(function (){
        $(this).data('id')

        $.post('delete_product.php', {
            product_id: $(this).data('id')
        },
        function (data)
        {
            console.log(data)
            alert('Delete Success')
            location.reload()
        }).fail(function(){
            alert('Delete Fail')
        })
    })
</script>
 
</body>
</html>