import {useForm} from 'react-hook-form'
import {createProduct} from '../../API/product'
import { getCategoriesRequest } from "../../API/category";

export default function CreateProductPage() {

  const {register, handleSubmit} = useForm()

  const getCategories = async () => {
    try {
      const res = await getCategoriesRequest() 
    } catch (error) {
      console.log(error)
    }
  } 


  return (
    <div className='bg-zinc-800 max-w-md p-10 rounded-md'>
      <form onSubmit={handleSubmit( async (values)=>{
        const res = await createProduct(values)
        console.log(res)
      })}>

        <h1 className='text-3xl font-bold underline'>Creando un producto</h1>

        <input 
          type="text"
          className='w-full bg-zinc-700 text-white px-4 py-2 rounded-md my-2'
          placeholder='Escribe en nombre del producto'
          {...register('name',{required:true})}
        />
        <textarea 
          className='w-full bg-zinc-700 text-white px-4 py-2 rounded-md my-2'
          placeholder='Escribe la description del producto'
          {...register('description', {required:true})}
        ></textarea>
        <input type="number"  
          className='w-full bg-zinc-700 text-white px-4 py-2 rounded-md my-2'
          placeholder='Escribe el precio del producto'
          {...register('price',{required:true})}
        />
        <input type="number"
          className='w-full bg-zinc-700 text-white px-4 py-2 rounded-md my-2'
          placeholder='Escribe el stock del producto'
          {...register('stock', {required:true})}
        />

        <select className='w-full bg-zinc-700 text-white px-4 py-2 rounded-md my-2'>
        
        </select>

        <button type="submit">Send Form</button>
      </form>
    </div>
  )
}
