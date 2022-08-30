// / ./assets/js/components/Home.js
    
import React, {Component} from 'react';
import {Route, Switch,Redirect, Link, withRouter} from 'react-router-dom';
// import Users from './Users';
// import Posts from './Posts';
    
class Home extends Component {
    
    render() {
        return (
           <div>
               <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div className={"navbar-brand"} >
                        <Link to={"/"}> Symfony React Project </Link>
                    </div> 
                    <ul className="navbar-nav mr-auto">
                        <li className="nav-item">
                            {/* <Link className={"nav-link"} to={"/posts"}> Posts </Link> */}
                            hello
                        </li>

                        <li className="nav-item">
                            {/* <Link className={"nav-link"} to={"/users"}> Users </Link> */}
                            hello
                        </li>
                    </ul>
               </nav>
           </div>
        )
    }
}
    
export default Home;
