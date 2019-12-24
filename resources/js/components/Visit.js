import React,{Component} from 'react';


export default class Visit extends Component
{
    constructor(props)
    {
        super(props);
    }

    render()
    {
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
                                    
                        </div>
        
                    <button className="submit" >Posalji u bazu</button>
                    </div>
        
                </div>
            </div>
        )
    }
        
}