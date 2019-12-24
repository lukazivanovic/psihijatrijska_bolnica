import React,{Component} from 'react';
import Treatmant from './Treatmant';


export default class Visit extends Component
{
    constructor(props)
    {
        super(props);
        this.state={
            count:0,
            last_input:
            {
                sb:null,
                sl:null,
                kl:0,
            }
        }

        this.callLarvel=this.callLarvel.bind(this);
        this.increaseCount=this.increaseCount.bind(this);
    }

    callLarvel()
    {
        this.props.callLarvel();
    }

    increaseCount()
    {
        console.log('povecaj1');
        let c=this.state.count;
        c++;
        this.setState({count:c});
    }

    render()
    {
        let treatments=[];
        for(let i=0; i<=this.state.count; i++)
        {
            treatments.push(<Treatmant key={i} increaseCount={this.increaseCount}></Treatmant>);
        }

        return(
            <div className="r_visit_form">
                <div className="flexRowRight">
                    <button>X</button>
                </div>

                <div className="vueFormaVisit">
                    <div className="donje">
                        <div className="flexRow">
                            <label>
                                <select >
                                    <option value="1">Prva Poseta</option>
                                    <option value="0">Kontrolna Poseta</option>
                                </select>
                            </label> 
                        </div>
                    
                    <label >Dijagnoza <textarea id="dijagnoza" cols="30" rows="10" ></textarea></label>
                    <label >Terapija <textarea id="terapija" cols="30" rows="10" ></textarea></label>
        
                        <div className="parentUpis">
                                   {treatments} 
                        </div>
        
                    <button className="submit" >Posalji u bazu</button>
                    </div>
        
                </div>
            </div>
        )
    }
        
}