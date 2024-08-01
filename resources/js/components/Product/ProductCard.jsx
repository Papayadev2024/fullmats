import Tippy from '@tippyjs/react';
import React, { useState } from 'react';
import 'tippy.js/dist/tippy.css';

const ProductCard = ({ item, width, bgcolor }) => {
  const [showAmbiente, setShowAmbiente] = useState(false);
  const category = item.category;

  return (
    <div
      onMouseEnter={() => setShowAmbiente(true)}
      onMouseLeave={() => setShowAmbiente(false)}
      className={`flex flex-col relative w-full md:${width} ${bgcolor}`} data-aos="zoom-in-left"
    >
      <div className={`${bgcolor} product_container basis-4/5 flex flex-col justify-center relative`}>
        <div className="absolute top-2 left-2 w-max">
          {item.tags?.map((tag) => (
            <div className="px-4 mb-1" key={tag.id}>
              <span
                className="block font-semibold text-[8px] md:text-[12px] bg-black py-2 px-3 flex-initial w-full text-center text-white rounded-[5px] relative top-[18px] z-10"
                style={{ backgroundColor: tag.color }}
              >
                {tag.name}
              </span>
            </div>
          ))}
          {
            item.descuento > 0 && <div className="px-4 mb-1">
              <span
                className="block font-semibold text-[8px] md:text-[12px] bg-black py-2 px-3 flex-initial w-full text-center text-white rounded-[5px] relative top-[18px] z-10"
                style={{ backgroundColor: '#10c469' }}
              >
                -{Math.round(100 - ((item.descuento * 100) / item.precio))}%
              </span>
            </div>
          }
        </div>
        <div>
          <div className="relative flex justify-center items-center h-[300px]">
            <img
              style={{
                opacity: !item.imagen_ambiente || !showAmbiente ? '1' : '0',
                scale: !item.imagen_ambiente || !showAmbiente ? '1.05' : '1',
                backgroundColor: '#eeeeee'
              }}
              src={item.imagen ? `/${item.imagen}` : '/images/img/noimagen.jpg'}
              alt={item.name}
              onError={(e) => e.target.src = '/images/img/noimagen.jpg'}
              className={`transition ease-out duration-300 transform w-full h-[300px] object-${category.fit} absolute inset-0`}
            />

            {item.imagen_ambiente && (
              <img
                style={{
                  opacity: showAmbiente ? '1' : '0',
                  scale: showAmbiente ? '1.05' : '1'
                }}
                src={`/${item.imagen_ambiente}`}
                alt={item.name}
                onError={(e) => e.target.src = '/images/img/noimagen.jpg'}
                className="transition ease-out duration-300 transform w-full h-[300px] object-cover absolute inset-0"
              />
            )}
          </div>
          <div className="addProduct text-center flex justify-center h-0">
            <a
              href={`/producto/${item.id}`}
              className="font-semibold text-[16px] bg-[#006BF6] py-2 px-4 text-center text-white rounded-3xl h-10"
            >
              Ver producto
            </a>
          </div>
        </div>
      </div>
      <a href={`/producto/${item.id}`} className='p-2'>
        <Tippy content={item.producto}>
          <h2 className="block text-[17px] text-center overflow-hidden" style={{ display: '-webkit-box', WebkitLineClamp: 2, textOverflow: 'ellipsis', WebkitBoxOrient: 'vertical', height: '51px' }}>
            {item.producto}
          </h2>
        </Tippy>
        <div className="flex content-between flex-row gap-4 items-center justify-center">
          <span className="text-[#006BF6] text-[16.45px] font-bold">S/. {item.descuento > 0 ? item.descuento : item.precio}</span>
          {item.descuento > 0 && (
            <span className="text-sm text-[#15294C] opacity-60 line-through">S/. {item.precio}</span>
          )}
        </div>
      </a>
    </div>
  );
};

export default ProductCard;