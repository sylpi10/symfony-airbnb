import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import './styles/app.scss';
import Home from './js/components/Home';
    
ReactDOM.render(<Router><Home /></Router>, document.getElementById('root'));