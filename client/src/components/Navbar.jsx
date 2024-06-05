import {Link} from 'react-router-dom'
export default function Navbar() {
  return (
    <nav className='bg-zinc-700 my-3 flex justify-between py-5 px-10 rounded-lg'>
        <h1 className='text-2xl font-bold'>Mi first CRUD whit react</h1>
        <ul className='flex gap-x-2'>
            <li>
                <Link to='/categories'>Categories</Link>
                <Link to='/'>Products</Link>
            </li>
        </ul>
    </nav>
  )
}
