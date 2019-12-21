import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import API from './API';

class Example extends Component {
    render() {
        return (
            <div><API /></div>
            
        );
    }
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
