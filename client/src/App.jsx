import React from 'react'
import { BrowserRouter ,Routes, Route } from "react-router-dom";

import IndexProductPage from "./pages/product/IndexProductPage";
import CreateProductPage from './pages/product/CreateProductPage'
import EditProductPage from './pages/product/EditProductPage'

import IndexCategoryPage from './pages/category/IndexCategoryPage'
import CreateCategoryPage from './pages/category/CreateCategoryPage'
import EditCategoryPage from './pages/category/EditCategoryPage'

import Navbar from "./components/Navbar";

export default function App() {
  return (
    <BrowserRouter>
      <Navbar/>
      <Routes>
        <Route path='/' element={<IndexProductPage/>}/>
        <Route path='/products/create' element={<CreateProductPage/>}/>
        <Route path='/products/edit/:id' element={<EditProductPage/>}/>
        <Route path='/categories' element={<IndexCategoryPage/>}/>
        <Route path='/categories/create' element={<CreateCategoryPage/>}/>
        <Route path='/categories/edit/:id' element={<EditProductPage/>}/>
      </Routes>
    </BrowserRouter>
  )
}
