    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Курсовой проект по дисциплине «Базы данных» студента группы з-445У-а А.В.Друшляка</p>
                <p class="pull-right">ТУСУР © 2018</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });

    function printTable (){
        if (document.getElementById('printContent')) {
            var textForPrint = document.getElementById('printContent').innerHTML;
            newWin=window.open('','printWindow','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0');
            newWin.document.open();
            newWin.document.write(textForPrint);
            newWin.document.close();
        }
        else {
            window.print();
        }
    }

</script>

</body>
</html>