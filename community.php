<?php
include "./inc/left.php";
include "./inc/top.php";
?>  
<link rel="stylesheet" href="./assets/css/style.css">
<div class="content">
    <div class="section1">
        <div class="title">
            <h1>자유게시판</h1>
        </div>
        <div class="search">
            <input type="text"><button>검색</button>
        </div>
    </div>
    
    <div class="section2">
        <div class="table_pc">
            <table>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>날짜</th>
                    <th>조회수</th>
                    <th>댓글</th>
                </tr>
                <tr>
                    <td><a href="./community_view.php">5</a></td>
                    <td><a href="./community_view.php">혹시 갓스물 서포터즈 지원하신 분들 중에 아직도 메일 읽지 않음으로 뜨는 분 계신가요?</td>
                    <td><a href="./community_view.php">이태희</td>
                    <td><a href="./community_view.php">2020.03.24</td>
                    <td><a href="./community_view.php">87</td>
                    <td><a href="./community_view.php">5</td>
                </tr>
                <tr>
                    <td><a href="#">4</a></td>
                    <td><a href="#">빠꼼이 인강 같이 들으실분?</a></td>
                    <td><a href="#">이태희</a></td>
                    <td><a href="#">2020.03.24</a></td>
                    <td><a href="#">75</a></td>
                    <td><a href="#">5</a></td>
                </tr>
                <tr>
                    <td><a href="#">3</a></td>
                    <td><a href="#">애견수제간식 온라인 창업 무료로 해드립니다.</a></td>
                    <td><a href="#">이태희</a></td>
                    <td><a href="#">2020.03.24</a></td>
                    <td><a href="#">37</a></td>
                    <td><a href="#">2</a></td>
                </tr>
                <tr>
                    <td><a href="#">2</a></td>
                    <td><a href="#">[취업연계 무료교육] 기업에서 모셔가는 IT 클라우드 기술 (서울/부산 모집!)</a></td>
                    <td><a href="#">이태희</a></td>
                    <td><a href="#">2020.03.24</a></td>
                    <td><a href="#">42</a></td>
                    <td><a href="#">5</a></td>
                </tr>
                <tr>
                    <td><a href="#">1</a></td>
                    <td><a href="#">스터디 카페에서 같이 자격증 준비하실분</a></td>
                    <td><a href="#">이태희</a></td>
                    <td><a href="#">2020.03.24</a></td>
                    <td><a href="#">43</a></td>
                    <td><a href="#">4</a></td>
                </tr>
            </table>

            <button class="insert"><a href="./community_write.php">글쓰기</a></button>

            <div class="paging">
                    <a href=""><<</a>
                    <a href="">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a href="">4</a>
                    <a href="">5</a>
                    <a href="">>></a>
            </div>
            
        </div> <!--table_pc-->

<!-- 모바일 버전을 위하여 -->
        <div class="table_mb">
            <ul>
                <li>
                    <a href="./community_view.php">
                        <p>혹시 갓스물 서포터즈 지원하신 분들 중에 아직도 메일 읽지 않음으로 뜨는 분 계신가요?</p>
                        <div class="sub_text">
                            <span>이태희</span>
                            <span>20.03.23</span>
                            <span>조회 16</span>
                            <span>댓글 2</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <p>빠꼼이 인강 같이 들으실분?</p>
                        <div class="sub_text">
                            <span>이태희</span>
                            <span>20.03.23</span>
                            <span>조회 16</span>
                            <span>댓글 2</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <p>애견수제간식 온라인 창업 무료로 해드립니다.</p>
                        <div class="sub_text">
                            <span>이태희</span>
                            <span>20.03.23</span>
                            <span>조회 16</span>
                            <span>댓글 2</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <p>[취업연계 무료교육] 기업에서 모셔가는 IT 클라우드 기술 (서울/부산 모집!)</p>
                        <div class="sub_text">
                            <span>이태희</span>
                            <span>20.03.23</span>
                            <span>조회 16</span>
                            <span>댓글 2</span>
                        </div>
                    </a>
                </li>  
                <li>
                    <a href="">
                        <p>스터디 카페에서 같이 자격증 준비하실분</p>
                        <div class="sub_text">
                            <span>이태희</span>
                            <span>20.03.23</span>
                            <span>조회 16</span>
                            <span>댓글 2</span>
                        </div>
                    </a>
                </li>
            </ul>
            <button class="insert"><a href="community_write.php">글쓰기</a></button>

            <div class="paging">
                    <a href=""><<</a>
                    <a href="">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a href="">>></a>
            </div>

        </div> <!-- table_mb -->

    </div> <!-- section2 -->
    
</div> <!-- content -->