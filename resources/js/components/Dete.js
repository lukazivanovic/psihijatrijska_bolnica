import React from 'react';


function Dete(props)
{
    console.log(props);
    return(
        <div> 
            Ovo je djete {props.ime} sa godinama {props.godine} 
             </div>
    )
}

export default Dete;