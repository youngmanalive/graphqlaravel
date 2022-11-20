import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';


const container = document.getElementById('root');
const root = createRoot(container);

const App = () => <div>hello world!</div>;
root.render(<App />);