import React, { useRef, useState } from 'react'
import FilterItem from './FilterItem'
import FilterItemSelect2 from './FilterItemSelect2'

const FilterContainer = ({ minPrice, setFilter, filter, maxPrice, categories = [], tags = [], brands = [], sizes = [], colors = [], attribute_values, tag_id, selected_category }) => {
  const categoryRef = useRef()

  const [openCategories, setOpenCategories] = useState({});

  const toggleAccordion = (id) => {
    setOpenCategories(prevState => ({
      ...prevState,
      [id]: !prevState[id]
    }));
  };

  const setMinPrice = (e) => {
    const newFilter = structuredClone(filter)
    newFilter.minPrice = Number(e.target.value) || 0
    setFilter(newFilter)
  }
  const setMaxPrice = (e) => {
    const newFilter = structuredClone(filter)
    newFilter.maxPrice = Number(e.target.value) || 0
    setFilter(newFilter)
  }

  const onClick = (key, value, checked) => {
    let newFilter = structuredClone(filter)
    if (!newFilter[key]) newFilter[key] = []
    if (checked) newFilter[key].push(value)
    else newFilter[key] = newFilter[key].filter(x => x != value)
    setFilter(newFilter)
  }

  const onCategoryChange = () => {
    const newFilter = structuredClone(filter)
    newFilter['category_id'] = $(categoryRef.current).val()
    setFilter(newFilter)
  }

  return (<>
    <button className="w-full py-3 text-base bg-[#FF560A] tracking-wider text-white text-center font-aeoniktrial_regular rounded-2xl" type="reset">
      Limpiar filtros
    </button>

    <FilterItem title="Rango de precio" className="flex flex-row gap-4 w-full mt-3 font-aeoniktrial_regular">
      <input type="number" className="w-1/2 rounded-md ring-0 border focus:border-[#FF560A] focus:ring-[#FF560A]" placeholder="Desde" min={minPrice} max={maxPrice} step={0.01} onChange={setMinPrice} />
      <input type="number" className="w-1/2 rounded-md ring-0 border focus:border-[#FF560A] focus:ring-[#FF560A]" placeholder="Hasta" min={minPrice} max={maxPrice} step={0.01} onChange={setMaxPrice} />
    </FilterItem>
    {
      categories.length > 0 && (

        <div className="w-full ">
          <h2 className="font-aeoniktrial_regular tracking-wide font-bold text-base mb-4">Categorias</h2>
          <div className='bg-black p-[1px] -mt-2 mb-5'></div>
          {categories.map((item) => {
            
           const isCheckedfilter = Array.isArray(filter?.categoria_id) && filter.categoria_id.includes(String(item.id));
           
           return categories.length > 0 && (<div key={item.id} className="w-full">
              <div className="flex flex-row justify-between gap-3 mb-2">

              <label key={item.id} htmlFor={`item-category-${item.id}`} className="text-custom-border flex flex-row gap-2  items-center cursor-pointer font-aeoniktrial_light">
                          <input id={`item-category-${item.id}`} name='category' type="checkbox" className="bg-[#DEE2E6] text-[#FF560A]  rounded-sm  border-none focus:ring-0" value={item.id} onClick={(e) => onClick(`category_id`, e.target.value, e.target.checked)}
                            defaultChecked={isCheckedfilter}
                          />
                          {item.name}
              </label>

                {/* <button
                  type="button"
                  className="w-full flex justify-between items-center py-2 px-4 text-left text-base text-[#111111]  bg-gray-100 hover:bg-gray-200 focus:outline-none"
                  onClick={() => toggleAccordion(item.id)}
                >
                  <span>{item.name}</span>
                  <svg
                    className={`w-5 h-5 transform transition-transform ${openCategories[item.id] ? 'rotate-180' : ''}`}
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button> */}
              </div>
              {/* {openCategories[item.id] && (
                <div className="p-4 border border-t-0 border-gray-200 space-y-4">
                  {
                    item.subcategories.map((subitem) => {

                      const isCheckedfilter = Array.isArray(filter?.subcategory_id) && filter.subcategory_id.includes(String(subitem.id));
                      return <>
                        <label key={subitem.id} htmlFor={`item-category-${subitem.id}`} className="text-custom-border flex flex-row gap-2  items-center cursor-pointer">
                          <input id={`item-category-${subitem.id}`} name='category' type="checkbox" className="text-[#FF560A] bg-[#FF560A] rounded-sm focus:ring-0 border-none" value={subitem.id} onClick={(e) => onClick(`subcategory_id`, e.target.value, e.target.checked)}
                            defaultChecked={isCheckedfilter}
                          />
                          {subitem.name}
                        </label>
                      </>

                    })
                  }

                </div>
              )} */}
            </div>
            )

          }
          )}
        </div>

      )
    }
    {
      tags.length > 0 && <div className="flex flex-col gap-4 w-full">
        <h2 className="font-semibold">Etiquetas</h2>
        <div className='flex flex-row gap-4 w-full flex-wrap'>
          {tags.map(item => {
            const isChecked = item.id === Number(tag_id);

            return (<label key={`item-tag-${item.id}`} htmlFor={`item-tag-${item.id}`} className="text-custom-border flex flex-row gap-2  items-center cursor-pointer">
              <input id={`item-tag-${item.id}`} name='tag' type="checkbox" className="bg-[#DEE2E6] rounded-sm  border-none" value={item.id} onClick={(e) => onClick(`txp.tag_id`, e.target.value, e.target.checked)}
                defaultChecked={isChecked} />
              {item.name}
            </label>)
          })}
        </div>
      </div>
    }
    {
      attribute_values.map((x, i) => (
        <FilterItem key={`attribute-${i}`} title={x[0].attribute.titulo} items={x} itemName='valor' itemImg='imagen' onClick={onClick} />
      ))
    }
    {/* <button className="text-white bg-[#0168EE] rounded-md font-bold h-10 w-24" type="submit">
      Filtrar
    </button> */}
  </>)
}

export default FilterContainer