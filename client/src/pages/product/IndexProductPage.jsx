import {Link} from 'react-router-dom'

export default function IndexProductPage() {
  return (
    <div>
      <Link className="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" to='/products/create'>Crear Producto</Link>


      <div class="relative overflow-x-auto mt-5">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          Product name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Color
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Category
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Price
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          Apple MacBook Pro 17"
                      </th>
                      <td class="px-6 py-4">
                          Silver
                      </td>
                      <td class="px-6 py-4">
                          Laptop
                      </td>
                      <td class="px-6 py-4">
                          $2999
                      </td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          Microsoft Surface Pro
                      </th>
                      <td class="px-6 py-4">
                          White
                      </td>
                      <td class="px-6 py-4">
                          Laptop PC
                      </td>
                      <td class="px-6 py-4">
                          $1999
                      </td>
                  </tr>
                  <tr class="bg-white dark:bg-gray-800">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          Magic Mouse 2
                      </th>
                      <td class="px-6 py-4">
                          Black
                      </td>
                      <td class="px-6 py-4">
                          Accessories
                      </td>
                      <td class="px-6 py-4">
                          $99
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>

    </div>
  )
}
