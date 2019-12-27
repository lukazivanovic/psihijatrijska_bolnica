import React,{Component} from 'react';

export default class Create_visit_treatmant extends Component
{
    constructor(props)
    {
        super(props);

        this.state={
            active:true,
        }

        this.increaseCount=this.increaseCount.bind(this);
        this.ukloni=this.ukloni.bind(this);
        this.ponisti=this.ponisti.bind(this);
        this.zadnjiUpis=this.zadnjiUpis.bind(this);
    }

    increaseCount()
    {
        this.props.increaseCount();
        this.setState({active:false});
        this.zadnjiUpis();
    }

    ukloni(event)
    {
        event.target.parentElement.remove();
    }

    ponisti(event)
    {
        event.target.value="";
    }

    zadnjiUpis()
    {
        this.props.zadnjiUpis();
    }

    render()
    {
       let button=(this.state.active)?
            <button className="noviUnosDugme" onClick={this.increaseCount}>Novi unos</button>:
            <button className="obrisi" onClick={this.ukloni}>X</button>;
        
        return(
            <div className="upis">
                <label>Sifra bolesti: <input type="text" className='r_sifra_bolesti' onFocus={this.ponisti}/></label>
                <label>Sifra leka: <input type="text" className='r_sifra_leka' onFocus={this.ponisti}/></label>
                <label>Kolicina leka: <input type="number" className='r_kolicina_leka' onFocus={this.ponisti}/></label>
                {button}
            </div>
        )
    }
}