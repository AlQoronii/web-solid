//import react router dom
import { Routes, Route } from "react-router-dom";

//import view homepage
import Home from '../views/pages/Home.jsx';

//import view posts index
// import PostIndex from '../views/posts/index.jsx';

// //import view post create
// import PostCreate from '../views/posts/create.jsx';

// //import view post edit
// import PostEdit from '../views/posts/edit.jsx';

function RoutesIndex() {
    return (
        <Routes>

            {/* route "/" */}
            <Route path="/" element={<Home />} />

        </Routes>
    )
}

export default RoutesIndex