import React from 'react'
import ReactDOM from 'react-dom'
import {  BrowserRouter as Router, Switch, Route} from 'react-router-dom';
import Index from './components/index'
import Login from './components/Login'
import Register from './components/Register'
import Home from './components/Home'
import Forgot from './components/forgot'
import Reset from './components/reset'
import Feedback from "./components/Feedback";
import Allposts from "./components/Allposts";
import CommunityHome from './components/CommunityHome'
import Createpost from './components/Createpost'
import Postpage from "./components/Postpage";


ReactDOM.render(
	<Router>
	    <Switch>
	        <Route exact path='/' component={Index}/>
	        <Route path='/login' component={Login}/>
	        <Route path='/register' component={Register}/>
	        <Route path='/home' component={Home}/>
	        <Route path='/feedback' component={Feedback}/>
	        <Route path='/forgotpassword' component={Forgot}/>
	        <Route path='/password/reset/:token' component={Reset}/>
			<Route path='/Allposts' component={Allposts}/>
            <Route path='/CommunityHome' component={CommunityHome}/>
            <Route path='/Createpost' component={Createpost}/>
            <Route path='/Postpage' component={Postpage}/>

		</Switch>
	</Router>,
    document.getElementById('app')
);