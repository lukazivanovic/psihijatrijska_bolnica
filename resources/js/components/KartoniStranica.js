import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import Pacijent from './Pacijent';
import Scroll from './Scroll';
import Karton from './Karton';

class KartoniStranica extends Component
{
    constructor()
    {
        super();
        this.state={
            baza:{},
            br_kartona:null,
            filter:"",
        }

        this.callLaravel=this.callLaravel.bind(this);
        this.upisiBrojKartona=this.upisiBrojKartona.bind(this);
        this.upisiIDstate=this.upisiIDstate.bind(this);
        this.filterPacijenti=React.createRef();
        this.upisiFilter=this.upisiFilter.bind(this);
    }

    callLaravel()
    {
        let opcije={
            "method": "GET",
        }

        fetch("/createDataJSON", opcije)
        .then(rsp=>rsp.json())
        .then(response => {
            // console.log(response);
            this.setState({
                baza:response,
            });
            
        })
        .catch(err => {
            console.log(err);
        });
    }

    upisiBrojKartona()
    {
        this.setState({br_kartona:event.target.value});
    }

    componentDidMount()
    {
        this.callLaravel();
    }

    upisiIDstate(id)
    {
        this.setState({br_kartona:id});
    }

    upisiFilter()
    {
        this.setState({filter:this.filterPacijenti.current.value.toLowerCase()});
    }

    getUserName(id)
    {
        for(let user of this.state.baza.users)
        {
            if(user.id==id) return user.name;
        }
        return id;
    }

    preperePatientList()
    {
        let listaPacijenta=[];
        for(let brKar in this.state.baza.charts)
        {
            let pom={};
            pom.id=this.state.baza.charts[brKar].osnovni.id;
            pom.ime=this.state.baza.charts[brKar].osnovni.ime;
            pom.prezime=this.state.baza.charts[brKar].osnovni.prezime;
            pom.datumRodjenja=pf.dateToSerbianFormat(this.state.baza.charts[brKar].osnovni.dat_rodjenja);
            pom.lekarIme=this.getUserName(this.state.baza.charts[brKar].osnovni.lekar);
            pom.lekar_id=this.state.baza.charts[brKar].osnovni.lekar;
            listaPacijenta.push(pom);
        }
        return listaPacijenta;
    }

    render()
    {
        if(Object.keys(this.state.baza).length===0)
        {
            return(
                <div>
                    <h1>Kartoni</h1>
                    <div>Loading</div>
                </div>
            )
        }

        if (this.state.br_kartona==null || this.state.br_kartona=="")
        {
            let listaPacijenta=this.preperePatientList();
            console.log(listaPacijenta);

            let pacijenti=listaPacijenta
            .filter(pacijent=>pacijent.lekar_id===this.state.baza.auth)
            .filter(pacijent=>pacijent.ime.toLowerCase().includes(this.state.filter) || pacijent.prezime.toLowerCase().includes(this.state.filter) || 
            pacijent.lekarIme.toLowerCase().includes(this.state.filter) || ("K-"+pacijent.id).toLowerCase().includes(this.state.filter)
            || pacijent.datumRodjenja.toLowerCase().includes(this.state.filter))
            .map((pacijent)=>{
                return <Pacijent key={pacijent.id} id={pacijent.id} ime={pacijent.ime} prezime={pacijent.prezime} lekarIme={pacijent.lekarIme} 
                datumRodjenja={pacijent.datumRodjenja} upisiIDstate={this.upisiIDstate}/>;
            });


            return(
                <div>
                    <h1>Kartoni</h1>
                    {/* <p>Upisi broj Kartona: <input type="text" onChange={this.upisiBrojKartona} /></p> */}
                    <p>Pretraga: <input type="text" ref={this.filterPacijenti} onChange={this.upisiFilter}/></p>
                    
                    <Scroll>
                        {pacijenti}
                    </Scroll>

                </div>
            )
        }

        if (this.state.br_kartona!=null || this.state.br_kartona!="")
        {
            if(this.state.baza.charts[this.state.br_kartona])
            {
                return(
                    <div>
                        <h1>Kartoni</h1>
                        {/* Upisi broj Kartona: <input type="text" onChange={this.upisiBrojKartona} /> */}
                        <Karton data={this.state.baza.charts[this.state.br_kartona]} upisiIDstate={this.upisiIDstate} callLaravel={this.callLaravel}/>
                    </div>
                )
            }
            else
            {
                return(
                    <div>
                        <h1>Kartoni</h1>
                        <p>Upisi broj Kartona: <input type="text" onChange={this.upisiBrojKartona} /></p>
                        <div>Ne postoji karton: {this.state.br_kartona}</div>
                    </div>
                )
            }
        }
            
    }
}


export default KartoniStranica;

if (document.getElementById('kartoniStranica')) {
    ReactDOM.render(<KartoniStranica />, document.getElementById('kartoniStranica'));
}