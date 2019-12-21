import React,{Component} from 'react';

export default class Pacijent extends Component
{
    constructor(props)
    {
        super(props);
        this.prikaziKarton=this.prikaziKarton.bind(this);
    }

    prikaziKarton()
    {
        this.props.upisiIDstate(this.props.id);
    }

    render()
    {
        return(
            <div className="r_pacijent" onClick={this.prikaziKarton}>
                <div>Br. Kart: K-{this.props.id} </div>
                <div>Ime: {this.props.ime} </div>
                <div>Prezime: {this.props.prezime} </div>
                <div>Datum Rodj: {this.props.datumRodjenja}</div>
                <div>Lekar: {this.props.lekarIme} </div>
            </div>
        );
    }
}