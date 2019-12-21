import React, { Component } from 'react';

export default class Kompi extends Component
{
    constructor(props)
    {
        super(props);
    }
    render()
    {
        return(
            <div> 
                Ovo je DETE: {this.props.ime} sa godinama {this.props.godine} 
                 </div>
        )
    }
}