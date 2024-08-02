import React from 'react';
import ReactDOM from 'react-dom';

function HelloReact() {
    return (
        <div>
            <h1>Hello, React!</h1>
        </div>
    );
}

export default HelloReact;

if (document.getElementById('root')) {
    ReactDOM.render(<HelloReact />, document.getElementById('root'));
}
