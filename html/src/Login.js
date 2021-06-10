import React from "react";
import './App.css';


const Modal = (props) => {
    if (!props.show) {
        return null
    }
    return (
        <div className="modal" onClick={props.onClose}>
            <div className="modal-content" onClick={e => e.stopPropagation()}>

                <div className="modal-header">
                    <div className="rowClose">
                        <span className="close" onClick={props.onClose}>&times;</span>
                    </div>

                    <div className="rowHeader">
                        <p>เลือกช่องทางการเข้าสู่ระบบ</p>
                    </div>
                </div>

                <div className="modal-body">
                    <button className="garenaBtn">
                        <a href={process.env.GarenaAuth}>
                            <span className="garenaIcon"></span>
                            <li className="garenaText2">
                                <p className="garenaText1">เข้าสู่ระบบด้วยบัญชี</p>
                                Garena
                            </li>
                        </a>
                    </button>

                    <p className="registerText1">
                        หากยังไม่มีบัญชีการีนาสามารถกด
                        <span><a href="#toRegister" className="registerText2">ลงทะเบียนบัญชีใหม่</a></span>
                    </p>

                    <p className="orText">หรือ</p>

                    <button className="facebookBtn">
                        <a href="#Facebook">
                            <span className="facebookIcon"></span>
                            <li className="facebookText2">
                                <p className="facebookText1">เข้าสู่ระบบด้วยบัญชี</p>
                                Facebook
                            </li>
                        </a>
                    </button>

                    <button className="googleBtn">
                        <a href="#Google">
                            <span className="googleIcon"></span>
                            <li className="googleText2">
                                <p className="googleText1">เข้าสู่ระบบด้วยบัญชี</p>
                                Google
                            </li>
                        </a>
                    </button>

                </div>

                <div className="modal-footer">
                    <p>
                        <span><a href="#PrivacyStatement" className="privacyStatement">Privacy Statement</a></span>
                        <span>|</span>
                        <span><a href="#TermsOfService" className="termsOfService">Terms of Service</a></span>
                    </p>
                </div>

            </div>
        </div>
    )
};

export default Modal;