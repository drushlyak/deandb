<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Курсовой проект по дисциплине «Базы данных» студента группы з-445У-а А.В.Друшляка</p>
                <p class="pull-right">ТУСУР © 2017</p>
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
        $searchingText = "/student/search/" + $searchingText + "/";
        document.location.href = $searchingText;
    }

</script>

</body>
</html>