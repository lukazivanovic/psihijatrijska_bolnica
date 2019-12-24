import React,{Component} from 'react';
import Visit from './Visit';

export default class Karton_osnovni_podaci extends Component
{
    constructor(props)
    {
        super(props);
        this.state={
            forma:false,
            istorija_bolesti:this.props.data.istorija_bolesti,
            alergija_lek:this.props.data.alergija_lek,
            visit:false,
        }
        this.otvoriDugme=this.otvoriDugme.bind(this);
        this.nazad=this.nazad.bind(this);
        this.otvoriFormu=this.otvoriFormu.bind(this);
        this.istorija=React.createRef();
        this.alergije=React.createRef();
        this.istorijaState=this.istorijaState.bind(this);
        this.alergijaState=this.alergijaState.bind(this);
        this.callLaravel=this.callLaravel.bind(this);
        this.sendData=this.sendData.bind(this);
        this.showNewVisit=this.showNewVisit.bind(this);
    }

    otvoriDugme()
    {
        let link=event.target.getAttribute('data-link');
        window.open(link);
    }

    nazad()
    {
        this.props.prikaziKarton();
    }

    otvoriFormu()
    {
        this.setState({forma:!this.state.forma});
    }

    istorijaState()
    {
        this.setState({istorija_bolesti:this.istorija.current.value});
    }

    alergijaState()
    {
        this.setState({alergija_lek:this.alergije.current.value});
    }

    callLaravel()
    {
        this.props.callLaravel();
    }

    sendData()
    {
        let niz={
            istorija_bolesti:this.state.istorija_bolesti || this.props.data.istorija_bolesti,
            alergija_lek:this.state.alergija_lek || this.props.data.alergija_lek,
            id:this.props.data.id,
            json:true, //da kazemo serveru da vrati json odogovor
        }

        let opcije={
            method: "POST",
            body: JSON.stringify(niz),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Content-Type': 'application/json'   //BITNO!!!
            }
        }

        // console.log('niz',niz,'token', document.querySelector('input[name="_token"]').value);
        
        fetch('/lekar/updateChart',opcije)
            .then(resp=>resp.json())
            .then(txt=>
                {
                  alert(txt);  
                  this.otvoriFormu();
                  this.callLaravel();
                });
    }

    showNewVisit()
    {
        // document.querySelector('#showVisit').classList.toggle('disapear');
        // sessionStorage.setItem('pacijent_id',this.props.data.id);
        // sessionStorage.setItem('lekar_id',this.props.data.lekar);
        // if(document.querySelector('#showVisit').className=="showVisit disapear")
        // {
        //     // location.reload()
        //     this.callLaravel();
        // }
        this.setState({visit:!this.state.visit});
    }

    componentDidUpdate()
    {
        if(this.state.visit==false)
        {
            this.callLaravel();
        }
    }

    render()
    {
        if(this.state.forma && !this.state.visit)
        {
            return(
                <div>
                    
                    <div className="formaReact">
                        
                        
                        <label>
                            Istorija bolesti:
                                <textarea defaultValue={this.props.data.istorija_bolesti} ref={this.istorija} onChange={this.istorijaState}/>
                        </label>

                        <label>
                            Alergija lek:
                                <textarea defaultValue={this.props.data.alergija_lek} ref={this.alergije} onChange={this.alergijaState}/>
                        </label>

                        <button className='linkDugme' onClick={this.otvoriFormu}>Odustani</button>
                        <button className='linkDugme' onClick={this.sendData}>Posalji</button>
                    </div>
                </div>
                    
            )
        }

        if(!this.state.forma && !this.state.visit)
        {
            return(
                <div>
                    
    
                    <div className="karton">
                     
                    <div className="pacijent-info">
                            <h1>{  this.props.data.ime } {  this.props.data.prezime }</h1>
                            <h3>Id Kartona: K-{ this.props.data.id}</h3>
                            <div className="dodaj-posetu">
                                <button className='linkDugme' onClick={this.showNewVisit}>Poseta Meni</button>
                                <button className='linkDugme' onClick={this.otvoriFormu}>Izmeni Karton</button>
                                <button onClick={this.nazad}>Nazad</button>
                            </div>
                            
                        </div>
                        <div className="karton-info">
                            <p>Datum Rodjenja: { pf.dateToSerbianFormat(this.props.data.dat_rodjenja) }</p>
                            <p>Pol: { this.props.data.pol}</p>
                            <p>Istorija Bolesti: {this.props.data.istorija_bolesti}</p>
                            <p>Alergija na lekove: {this.props.data.alergija_lek}</p>
                        </div>
                    </div>
                </div>
                
            )
        }

        if(this.state.forma && this.state.visit)
        {
            return(
                <div>
                    <div className="flexRow">
                             <Visit id={this.props.data.id} lekar={this.props.data.lekar} 
                            callLaravel={this.callLaravel} showNewVisit={this.showNewVisit}></Visit>
                           
                    </div>
                    <div className="formaReact">
                        
                        
                        <label>
                            Istorija bolesti:
                                <textarea defaultValue={this.props.data.istorija_bolesti} ref={this.istorija} onChange={this.istorijaState}/>
                        </label>

                        <label>
                            Alergija lek:
                                <textarea defaultValue={this.props.data.alergija_lek} ref={this.alergije} onChange={this.alergijaState}/>
                        </label>

                        <button className='linkDugme' onClick={this.otvoriFormu}>Odustani</button>
                        <button className='linkDugme' onClick={this.sendData}>Posalji</button>
                    </div>
                </div>
                    
            )
        }

        if(!this.state.forma && this.state.visit)
        {
            return(
                <div>
                    <div className="flexRow">
                            <Visit id={this.props.data.id} lekar={this.props.data.lekar} 
                            callLaravel={this.callLaravel} showNewVisit={this.showNewVisit}></Visit>
                            
                    </div>
    
                    <div className="karton">
                     
                    <div className="pacijent-info">
                            <h1>{  this.props.data.ime } {  this.props.data.prezime }</h1>
                            <h3>Id Kartona: K-{ this.props.data.id}</h3>
                            <div className="dodaj-posetu">
                                <button className='linkDugme' onClick={this.showNewVisit}>Poseta Meni</button>
                                <button className='linkDugme' onClick={this.otvoriFormu}>Izmeni Karton</button>
                                <button onClick={this.nazad}>Nazad</button>
                            </div>
                            
                        </div>
                        <div className="karton-info">
                            <p>Datum Rodjenja: { pf.dateToSerbianFormat(this.props.data.dat_rodjenja) }</p>
                            <p>Pol: { this.props.data.pol}</p>
                            <p>Istorija Bolesti: {this.props.data.istorija_bolesti}</p>
                            <p>Alergija na lekove: {this.props.data.alergija_lek}</p>
                        </div>
                    </div>
                </div>
                
            )
        }
        
    }
}