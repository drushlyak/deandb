<footer id="footer"><!--Footer-->
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
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>

<script>
    function searchTextInDb (){
        var $searchingText;
        $searchingText = document.getElementById("searchingText").value;
        if ($searchingText == '') {
            alert ('Пустой запрос!');
        }
        else {
            $searchingText = 'http://deandb.loc/student/search/' + $searchingText + '/';
            document.location.href = $searchingText;
        }
        return false;
    }

    function printTable (){
        if (document.getElementById('printContent')) {
            var textForPrint = document.getElementById('printContent').innerHTML;
            textForPrint = textForPrint.replace("height=\"100%\" width=\"100%\"", "height=\"190px\" width=\"160px\"a");
            textForPrint = textForPrint.replace("<a href=\"javascript: printTable();\" class=\"btn btn-default back\"><i class=\"fa fa-print\"></i> Печать</a>", "");
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