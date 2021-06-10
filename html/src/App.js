import React, { useState, useEffect } from 'react';
import './App.css';
import Slider from "react-slick";
import Modal from "./Login";
import axios from 'axios';

//import React, { Component } from "react";

const App = () => {
  


    const [show, setShow] = useState(false)
    //กำหนดตัวแปรที่นี่
    var settings = {
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnHover: true,
        accessibility: false,
        arrows: false,
    };


    {
        const [hasError, setErrors] = useState(false)
        const [users, setUsers] = useState({})
        const [features, setFeatures] = useState([])
        const [rplActivities, setRplActivities] = useState([])
        const [tournaments, setTournaments] = useState([])

        useEffect(() => {
            axios.get(`http://test.esports.rov.in.th/api/featured`).then((res) => {
                console.log(res.data.data)
                setFeatures(res.data.data)
            })

            axios.get(`http://test.esports.rov.in.th/api/tournament`).then((res) => {
                console.log(res.data.data)
                setTournaments(res.data.data)
            })

            axios.get(`http://test.esports.rov.in.th/api/rplActivity`).then((res) => {
                console.log(res.data.data)
                setRplActivities(res.data.data)
            })

        }, []
        )



        //พื้นที่แสดงผล ในนี้จ้า
        return (
            <div className="App">

                <nav className="navbar navbar-default">
                    <ul className="topnav" id="myTopnav">

                        <li><img src="images/navbar/logo_rov.png" alt="logo"></img></li>
                        <ul className="homenav">
                            <li><a href="home">หน้าหลัก<p><small>HOME</small></p><div className="underline"></div></a></li>
                        </ul>
                        <li><a href="https://esports.rov.in.th/">ทัวร์นาเมนต์<p><small>TOURNAMENT</small></p><div className="underline"></div></a></li>

                        <li><a href="https://rpl2021.rov.in.th/">กิจกรรม<p><small>ACTIVITY</small></p><div className="underline"></div></a></li>

                        <li><div className="dropdown">
                            <div className="dropbtn">หอเกียรติยศ<p><small>HALL OF FAME</small></p><div className="underline"></div></div>
                            <div className="dropdown-content">
                                <a href="https://rov.in.th/esports/rpls1">RoV Pro League S1</a>
                                <a href="https://rov.in.th/esports/rpls2">RoV Pro League S2</a>
                                <a href="https://rov.in.th/esports/rpls3">RoV Pro League S3</a>
                                <a href="https://rov.in.th/esports/rpls4">RoV Pro League S4</a>
                                <a href="https://rov.in.th/esports/rpls5">RoV Pro League 2020 Summer</a>
                                <a href="https://rov.in.th/esports/rpls6">RoV Pro League 2020 Winter</a>
                            </div>
                        </div></li>

                        <li><a href="https://support.garena.in.th/new/games/faqs/1/garena-rov">บริการลูกค้า<p><small>SUPPORT</small></p><div className="underline"></div></a></li>
                        <li><a href="news">ข่าวสาร<p><small>NEWS</small></p><div className="underline"></div></a></li>

                        <li className="right"><a href="#" onClick={() => setShow(true)}>เข้าสู่ระบบ</a></li>
                        <Modal onClose={() => setShow(false)} show={show}></Modal>
                        {/* <Modal onClose={() => setShow(false)} show = {show}/> */}

                    </ul>

                </nav>





                {/* แสดงผลสไลด์ตรงนี้ */}
                <div className="row">
                    <div className="Featured">
                        <h2>FEATURED</h2>
                        <Slider {...settings}>

                            {features.map((feature, index) => (

                                <div keys={index} className="content1">

                                    <div className="topright">{feature.textIndication}</div>

                                    <img className="pic1" src={feature.photo}/>

                                    <div className="centered1">

                                        <div className="row1">
                                            <div className="column1">
                                                <img className="icon1" src={feature.logo} />

                                            </div>

                                            <div className="column2">
                                                <h3>{feature.title}</h3>
                                                <h5>{feature.description}</h5>

                                            </div>

                                            <div className="column3">
                                                <a href="#" className="button">ข้อมูลเพิ่มเติม +</a>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            ))}


                        </Slider>
                    </div>




                    {/* สไลด์ฝั่งขวาบน */}
                    <div className="column">
                        <div className="RPL">
                            <h2>RPL    <span>ACTIVITY</span></h2>
                            <Slider {...settings}>

                                {rplActivities.map((rplActivity, index) => (

                                    <div keys={index} className="content1">


                                        <div className="topleft">{rplActivity.textIndication}</div>

                                        <img className="pic2" src={rplActivity.photo} />

                                        <div className="centered2">

                                            <div className="row1">

                                                <div className="column4">
                                                    <h3>{rplActivity.title}</h3>
                                                    <h5>{rplActivity.description}</h5>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                ))}
                            </Slider>
                        </div>



                        {/* สไลด์ฝั่งขวาล่่าง */}
                        <div className="TOURNAMENT">
                            <h2>TOURNAMENT</h2>
                            <Slider {...settings}>

                                {tournaments.map((tournament, index) => (

                                    <div keys={index} className="content1">

                                        <div className="topleft2">{tournament.textIndication}</div>
                                        <img className="pic3" src={tournament.photo} />
                                        <div className="centered3">
                                            <div className="row1">
                                                <div className="column4">
                                                    <h3>{tournament.title}</h3>
                                                    <h5>{tournament.description}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                ))}
                            </Slider>
                        </div>
                    </div>
                </div>







                <div id="container">
                    <div className="footer">
                        <div className="flex-container">

                            <div className="homeflex"><a href="home" id="link-with-no-border">HOME</a></div>
                            <div><a href="https://esports.rov.in.th/" id="link-with-no-border">TOURNAMENT</a></div>

                            <div>
                                <a href="https://rpl2021.rov.in.th/" id="link-with-no-border">ACTIVITY</a><br></br><br></br>
                                <a href="https://support.garena.in.th/new/games/faqs/1/garena-rov" id="link-with-no-border">SUPPORT</a>
                            </div>

                            <div></div>
                            <div></div>

                            <div className="social-icons">

                                <a href="https://twitter.com/GarenaRoVTH"><img src="images/footer/footer_socials_icon/icon_twitter.png" ></img></a>
                                <a href="https://www.youtube.com/channel/UCy19QXxbCHh8qVVCbuGk-ig"><img src="images/footer/footer_socials_icon/icon_youtube.png"></img></a>
                                <a href="https://www.instagram.com/garena_rov_official/"><img src="images/footer/footer_socials_icon/icon_instagram.png"></img></a>
                                <a href="https://www.facebook.com/ROVTH"><img src="images/footer/footer_socials_icon/icon_facebook.png"></img></a>

                            </div>

                        </div>
                    </div>
                </div>


                <div id="container">
                    <div className="footer2">
                        <div>
                            <h1 className="floatleft">©2015 TENCENT GAMES INC. ALL RIGHTS RESERVED</h1>
                            <h1 className="floatright">TERM OF SERVICE | PRIVACY STATEMENT</h1>
                        </div>
                    </div>
                </div>


            </div >


        );
    }

}

export default App;
