import { createRoot } from 'react-dom/client';
import Home from './components/Home';
const root = createRoot(document.querySelector('.app'));
const App = () => {
    return <Home />
}
root.render(<App />);