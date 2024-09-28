<footer class="bg-dark text-inverse mb-4">
    <div class="container py-13 py-md-10">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="mb-4" src="../assets/img/logo-light.png"
                            srcset="./assets/img/logo/logo-spread.png" style="height: 120px;" alt="" />
                    </div>
                    <div class="col-lg-8">
                        <!-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.0567078877293!2d100.67164121136379!3d13.775453796688144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d63d7c735d12b%3A0xd3b57305e66ca6!2zRlVKSSBFTlZJUk8g4oCOKFRIQUlMQU5EKeKAjiBDTy4sTFRE!5e0!3m2!1sth!2sth!4v1718877928408!5m2!1sth!2sth"
                                    width="360" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <iframe
                            src="{{ $ContactUs->maplocation }}"
                            style="width:100%; height: 250px; border:0" allowfullscreen></iframe>
                        <div class="offcanvas-footer">
                            <div>
                                <nav class="nav social social-white">
                                    <!-- <a href="#"><i class="uil uil-twitter"></i></a> -->
                                    <a href="https://www.facebook.com"><i class="uil uil-facebook-f"></i></a>
                                    <!-- <a href="#"><i class="uil uil-line"></i></a>
                                    <a href="#"><i class="uil uil-instagram"></i></a> -->
                                    <a href="https://www.youtube.com"><i class="uil uil-youtube"></i></a>
                                </nav>
                                <!-- /.social -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 offset-lg-2">
                <div class="widget">
                    <address>
                    
                    {{ strip_tags($ContactUs->{'address_' . app()->getLocale()}) }}    
                    
                    </address>
                    @php
                        $mailArray = json_decode($ContactUs->mail, true); // แปลง JSON string เป็นอาร์เรย์
                        $telArray = json_decode($ContactUs->tel, true); // แปลง JSON string เป็นอาร์เรย์
                    @endphp
                    <p class="d-flex align-items-center">
                        @if (is_array($mailArray) && count($mailArray) > 0)
                            
                            @foreach ($mailArray as $email)
                                <i class="uil uil-envelope me-2" style="font-size: 24px;"></i> 
                                <a href="mailto:{{ $email }}">{{ $email }}</a> 
                            @endforeach
                            
                        @else
                            
                        @endif
                        
                    </p>
                    <p class="d-flex align-items-center">
                        @if (is_array($telArray) && count($telArray) > 0)
                                
                            @foreach ($telArray as $tel)
                                <i class="uil uil-phone-volume me-2" style="font-size: 24px;"></i>{{ $tel }}
                    
                            @endforeach
                            
                        @else
                            
                        @endif
                        
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8">
                <img src="../assets/img/logo/logo.webp" alt="cw" width="30" />
                Engine by CW | Copy Allright Reserved : 2024 www.fujienviro.co.th
            </div>
            <div class="col-lg-4 d-flex">
                <div class="d-flex align-items-center me-8">
                    <i class="uil uil-user me-2" style="font-size: 24px;"></i>
                    <div class="text-center fs-11" style="line-height: 14px;">
                        Today<br>
                        <span id="todayCount" class="fw-bold">0</span>
                    </div>
                </div>
                <div class="d-flex align-items-center me-8">
                    <i class="uil uil-calender me-2" style="font-size: 28px;"></i>
                    <div class="text-center fs-11" style="line-height: 14px;">
                        This month<br>
                        <span id="monthCount" class="fw-bold">0</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <i class="uil uil-calendar-alt me-2" style="font-size: 24px;"></i>
                    <div class="text-center fs-11" style="line-height: 14px;">
                        All<br>
                        <span id="totalCount" class="fw-bold">0</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
<script>
    // ฟังก์ชันในการนับจำนวนผู้เข้าชม
    function countVisitors() {
        // ดึงค่าจำนวนผู้เข้าชมที่เก็บใน localStorage
        let todayVisitors = localStorage.getItem('todayVisitors') || 0;
        let monthVisitors = localStorage.getItem('monthVisitors') || 0;
        let totalVisitors = localStorage.getItem('totalVisitors') || 0;

        // อัพเดตค่าจำนวนผู้เข้าชม
        todayVisitors++;
        monthVisitors++;
        totalVisitors++;

        // เก็บค่ากลับไปใน localStorage
        localStorage.setItem('todayVisitors', todayVisitors);
        localStorage.setItem('monthVisitors', monthVisitors);
        localStorage.setItem('totalVisitors', totalVisitors);

        // แสดงจำนวนผู้เข้าชม
        document.getElementById('todayCount').innerText = todayVisitors;
        document.getElementById('monthCount').innerText = monthVisitors;
        document.getElementById('totalCount').innerText = totalVisitors;
    }

    // เรียกฟังก์ชันเมื่อโหลดหน้า
    window.onload = countVisitors;
</script>
