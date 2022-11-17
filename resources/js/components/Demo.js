import React from 'react';
import ReactDOM from 'react-dom';
import { useState } from 'react/cjs/react.development';

function Demo() {
    const [list, setList] = useState([]);
    const [postcode, setPostCode] = useState(2003);
    const searchPostcode = async () => {
        await axios.post(`/searchByPostcode`, { postcode })
            .then(res => {
                setList(res.data.data)
            })

    }

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-12">
                    Please input the postcode (2000 - 2005) <input value={postcode} onChange={e => setPostCode(e.target.value)} />
                </div>
                <div className="col-md-12">
                    <button onClick={searchPostcode}>Search</button>
                </div>
                <div className="col-md-12">
                    <ul>
                        {
                            list.map((obj, i) => <li key={i}>{obj.address} , {obj.postcode}</li>)
                        }
                    </ul>
                </div>
            </div>
        </div>
    );
}

export default Demo;

if (document.getElementById('demo')) {
    ReactDOM.render(<Demo />, document.getElementById('demo'));
}
