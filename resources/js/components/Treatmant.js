import React,{Component} from 'react';

export default class Visit extends Component
{
    constructor(props)
    {
        super(props);

        this.increaseCount=this.increaseCount.bind(this);
    }

    increaseCount()
    {
        this.props.increaseCount();
    }

    render()
    {
        return(
            <div className="upis">
                <label>Sifra bolesti: <input type="text" className='sifra_bolesti'/></label>
                <label>Sifra leka: <input type="text" className='sifra_leka'/></label>
                <label>Kolicina leka: <input type="number" className='kolicina_leka'/></label>
                <button className="noviUnosDugme" onClick={this.increaseCount}>Novi unos</button>
                <button className="obrisi">X</button>
            </div>
        )
    }
}