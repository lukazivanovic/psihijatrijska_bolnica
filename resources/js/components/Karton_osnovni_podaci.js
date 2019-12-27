import React, { Component } from 'react';
import Create_visit from './Create_visit';

export default class Karton_osnovni_podaci extends Component {
    constructor(props) {
        super(props);
        this.state = {
            forma: false,
            istorija_bolesti: this.props.data.istorija_bolesti,
            alergija_lek: this.props.data.alergija_lek,
            visit: false,
            odgovor: null,
        }
        this.otvoriDugme = this.otvoriDugme.bind(this);
        this.nazad = this.nazad.bind(this);
        this.otvoriFormu = this.otvoriFormu.bind(this);
        this.istorija = React.createRef();
        this.alergije = React.createRef();
        this.istorijaState = this.istorijaState.bind(this);
        this.alergijaState = this.alergijaState.bind(this);
        this.callLaravel = this.callLaravel.bind(this);
        this.sendData = this.sendData.bind(this);
        this.showNewVisit = this.showNewVisit.bind(this);
    }

    otvoriDugme() {
        let link = event.target.getAttribute('data-link');
        window.open(link);
    }

    nazad() {
        this.props.prikaziKarton();
    }

    otvoriFormu() {
        this.setState({ forma: !this.state.forma });
    }

    istorijaState() {
        this.setState({ istorija_bolesti: this.istorija.current.value });
    }

    alergijaState() {
        this.setState({ alergija_lek: this.alergije.current.value });
    }

    callLaravel() {
        this.props.callLaravel();
    }

    sendData() {
        let niz = {
            istorija_bolesti: this.state.istorija_bolesti || this.props.data.istorija_bolesti,
            alergija_lek: this.state.alergija_lek || this.props.data.alergija_lek,
            id: this.props.data.id,
            json: true, //da kazemo serveru da vrati json odgovor
        }

        let opcije = {
            method: "POST",
            body: JSON.stringify(niz),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Content-Type': 'application/json'   //BITNO!!!
            }
        }

        // console.log('niz',niz,'token', document.querySelector('input[name="_token"]').value);

        fetch('/lekar/updateChart', opcije)
            .then(resp => resp.json())
            .then(txt => {
                this.setState({ odgovor: txt });
                this.otvoriFormu();
                this.callLaravel();
            });
    }

    showNewVisit() {
        this.setState({ visit: !this.state.visit });
    }

    componentDidUpdate() {
        if (this.state.visit == false) {
            this.callLaravel();
        }
    }

    render() {
        if (this.state.forma) {
            return (
                <div className="formaReact">
                    <label>
                        <p>Istorija bolesti:</p>
                        <textarea defaultValue={this.props.data.istorija_bolesti} ref={this.istorija} onChange={this.istorijaState} />
                    </label>

                    <label>
                        <p>Alergija lek:</p>
                        <textarea defaultValue={this.props.data.alergija_lek} ref={this.alergije} onChange={this.alergijaState} />
                    </label>

                    <p>
                        <button className='linkDugme' onClick={this.otvoriFormu}>Odustani</button>
                        <button className='linkDugme' onClick={this.sendData}>Posalji</button>
                    </p>
                    

                    <div className="r_error">{this.state.odgovor}</div>
                </div>
            )
        }

        if (this.state.visit) {
            return (
                <div>
                    <Create_visit id={this.props.data.id} lekar={this.props.data.lekar}
                        callLaravel={this.callLaravel} showNewVisit={this.showNewVisit}></Create_visit>
                </div>

            )
        }

        return (
            <div className="karton">
                <div className="pacijentInfo">
                    <div className="pacijentKarton">
                        <p className="infoId">Id Kartona: K-{this.props.data.id}</p>
                        <p className="infoIme">{this.props.data.ime} {this.props.data.prezime}</p>
                        <p className="ostalo">Datum Rodjenja: {pf.dateToSerbianFormat(this.props.data.dat_rodjenja)}</p>
                        <p className="ostalo">Pol: {this.props.data.pol}</p>
                        <p className="ostalo">Alergija na lekove: {this.props.data.alergija_lek}</p>
                    </div>
                    <div className="dodaj-posetu">
                        <button className='linkDugme' onClick={this.showNewVisit}>Poseta Meni</button>
                        <button className='linkDugme' onClick={this.otvoriFormu}>Izmeni Karton</button>
                    </div>
                </div>
                <div className="istorijaBolesti">
                    <p>Istorija Bolesti:</p>
                    <p className="opisIstorija">{this.props.data.istorija_bolesti}</p>
                    <div className="nazad">
                        <button onClick={this.nazad}>Nazad</button>
                    </div>

                </div>
                <div className="r_error">{this.state.odgovor}</div>
            </div>
        )
    }
}