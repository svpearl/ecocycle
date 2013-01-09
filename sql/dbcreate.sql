create table category(
 id integer not null primary key auto_increment,
 name varchar(255) not null unique key);

create table product(
 id integer not null primary key auto_increment,
 name varchar(255) not null,
 description varchar(1024) not null,
 category_id integer not null,
 imagepath varchar(255) not null,
 itemprice float not null,
 foreign key (category_id) references category(id)
);

insert into category (name)
values
  ('Cups'),
  ('Plates'),
  ('Bowls'),
  ('Food Containers'),
  ('Bags'),
  ('Stationaries')
;

insert into product (name, description, category_id, imagepath, itemprice)
values
  ('12 oz Clear Plastic Cup', 'Our clear fully compostable PLA cups are made from corn, grown in the USA. Almost indistinguishable from petroleum based plastics, the cups will degrade into water, carbon dioxide and organic material when properly composted. Suitable for cold beverages. Not Microwaveable. This product comes in a pack of 50 cups.', 1, 'images/cup/plastic-cup.jpg', 1.50),
  ('12 oz Paper Cold Cup', 'Our durable paper cups are made from 70% post-consumer recycled paper. They are suitable for all of your cold beverages. Not Microwaveable. This product comes in a pack of 50 cups.', 1, 'images/cup/paper-cup.jpg', 1.50),
  ('12oz Insulated Paper Cup', 'This dual layered cup contains 20% post-consumer recycled fiber on the outer layer and 90% post-consumer fiber. Triple layer thermal insulation keeps the cup cold to touch while the contents stay hot. Microwaveable. This product comes in a pack of 25 cups.', 1, 'images/cup/dixie-insulair-cup.jpg', 2.5),
  ('12 oz Standard Paper Cup', 'Made from rigid paperboard with 100% PLA compostable layer. They come with a thermal cardboard sleeve to keep the cup cold on the outside. Microwaeable. This product comes in a pack of 25 cups.', 1, 'images/cup/plain-cup.jpg', 2.0),
  ('15 oz Handmade Glass Cup', 'Our glass cups are made from recycled glass and mouth blown for individuality. Cool graphics etched on the surface too !.', 1, 'images/cup/glasscup-small.jpg', 43.0),
  ('KeepCup', 'KeepCups are the first barista-standard reusable coffee cups, which means you can use them over and over again instead of getting takeaway cups everytime you need that caffeine injection.', 1, 'images/cup/keepcup-small.jpg', 9.20);

insert into product (name, description, category_id, imagepath, itemprice)
values
  ('Square Dinner Plate', 'This square dinner plate is fashionable while being environmentally responsible too ! It is made entirely out of recycled glass. Comes in a set of 2 plates.', 2, 'images/plate/dinner-plate-small.jpg', 7.5),
  ('Square Paper Plate', 'This 80% post-consumer recycled cardboard plate has the looks of a bamboo wooden plate. This product comes in a set of 2.', 2, 'images/plate/square-plates.jpg', 10.00),
  ('Glass snack Plate', 'Made of recycled soft drink bottles, this plate set is perfect for serving spicy snacks on cold evenings. Comes in a set of 2.', 2, 'images/plate/glass-snack-plate-small.jpg', 5.5),
  ('Deep glass snack Plate', 'This variant of the recycled glass snack plate is deeper for more snacks :) Comes in a set of 2.', 2, 'images/plate/glass-snack-plate2-small.jpg', 5.5),
  ('Pyrex Serving Dish', 'Authentic Pyrex serving dish with patterned edges. Sold single.', 2, 'images/plate/pyrex-plate-small.jpg', 9.50);

insert into product (name, description, category_id, imagepath, itemprice)
values
  ('Paper Bowl', 'The trusted paper bowl for all of your party needs is now made of recycled paperboard. Comes in a pack of 25 bowls.', 3, 'images/bowl/paper-bowl.jpg', 2.75),
  ('Papier Mache fruit Bowl', 'This Papier Mache bowl made out of recycled paper is suitable for showing off your fruit collection and green creds.', 3, 'images/bowl/fruit-bowl-papier-mache-small.jpg', 6.0),
  ('Glass Snack Bowl', 'This bowl made of recycled glass can serve out your evening snacks in style. It has a distinct hand made feel to it. Comes in a set of 2.', 3, 'images/bowl/glass-snack-bowl-small.jpg', 12.0),
  ('Mandala Bowl Green', 'The funky Mandala design bowl is made of recycled 12" vinyl records. The bowl has a green background and the design is hand painted with glossy black acrylic. The bowl is food safe and makes for a colorful art object on your coffee table.', 3, 'images/bowl/mandala-bowl-small.jpg', 45.50),
  ('Mandala Bowl White', 'The funky Mandala design bowl is made of recycled 12" vinyl records. The bowl has a white background and the design is hand painted with glossy black acrylic. The bowl is food safe and makes for a colorful art object on your coffee table.', 3, 'images/bowl/mandala-bowl2-small.jpg', 45.50),
  ('Wooden Bowl', 'This wooden fruit bowl makes for a perfect complement when set on your traditional wooden coffee tables. It is large enough to hold 3 apples.', 3, 'images/bowl/wooden-bowl-small.jpg', 13.25);

insert into product (name, description, category_id, imagepath, itemprice)
values
  ('Bioware Togo box', 'Togo box made from 100% PLA plastic that is fully compostable. This product comes in a pack of 20 containers.', 4, 'images/foodcontainer/togo-box.jpg', 20.0),
  ('Plastic Take-Out Container Round', 'Our plastic containers are manufactured with the highest-quality, virgin food-grade plastic making every one reusable, recyclable and toxin-free. This round container has a capacity of 18oz.', 4, 'images/foodcontainer/black-box-round-small.jpg', 6.50),
  ('Plastic Take-Out Container Rectangle', 'Our plastic containers are manufactured with the highest-quality, virgin food-grade plastic making every one reusable, recyclable and toxin-free. This rectangle container has a capacity of 16oz.', 4, 'images/foodcontainer/black-box-small.jpg', 5.50),
  ('Paperboard Togo box', 'This large capacity togo box made of 100% recycled paperboard is ideal for serving boxed lunch at conferences and seminars. No more soggy togo boxes.', 4, 'images/foodcontainer/cardboard-box.jpg', 2.5),
  ('2-level Bento Box', 'This two-level Japanese traditional Bento Box is exquisitely designed and made from lacquerware. No better way to pack lunch for loved ones.', 4, 'images/foodcontainer/bento-box-small.jpg', 24.50),
  ('Small carryon box', 'This container is ideal for packing non-gravy food items like noodles and rice.', 4, 'images/foodcontainer/noodles-box.jpg', 1.25),
  ('Hello Kitty Lunch Box', 'This cute Hello Kitty Lunch box is sure to make kids wait for lunch time.', 4, 'images/foodcontainer/hello-kitty-box-small.jpg', 7.50),
  ('Plastic Cutlery Set', 'This PLA plastic cutlery set comes with 6 Spoons, 6 Forks, 6 Knives, 12 plates and 12 cups, together with convenient bags to pack them all.', 4, 'images/foodcontainer/set.jpg', 13.50);

insert into product (name, description, category_id, imagepath, itemprice)
values
  ('Grocery Bag', 'Say goodbye to all the landfill-choking plastic bags handed out in your grocery store by picking up this grocery bag. You can even show some attitude if someone bugs you :)', 5, 'images/bag/bugme-bag.jpg', 2.75),
  ('Go Green Grocery Bag', 'Grocery bag that flaunts your green credentials.', 5, 'images/bag/grocery-bag.jpg', 2.75),
  ('Embroidered Bag', 'This is your ideal bag for carrying library books. Fits 5 medium sized books.', 5, 'images/bag/cloth-bag-small.jpg', 3.75),
  ('Recycle Item Bag', 'Use this bag to pile up your recyclable items for convenient disposal later.', 5, 'images/bag/green-recycling-bag.png', 2.25),
  ('Paper Bag', 'These paper bags are convenient to keep stationary items or pass gifts. Comes in a set of 6 small and 2 big bags.', 5, 'images/bag/paperbag.jpg', 3.20),
  ('Plastic Crocheted Bag', 'This fat bottomed bag is crocheted using recycled plastic newspaper bags. It is strong and large enough to take the load of 3 medium books.', 5, 'images/bag/plastic-crocheted-bag.jpg', 17.80);

insert into product (name, description, category_id, imagepath, itemprice)
values
  ('Spiral Notebook', 'Spiral Notebook made from 40% post-consumer recycled paper. Available in a variety of colors.', 6, 'images/stationary/books.jpg', 1.75),
  ('File folder', 'Simple and easy to use file folder that can hold upto 50 Letter sized sheets. Made from 50% post-consumer recycled paper.', 6, 'images/stationary/files.jpg', 1.00),
  ('Handbound Notebook', 'This handbound notebook is recycled from cereal box, stationary, dictionary, and wall papers.', 6, 'images/stationary/handboundnotebook.jpg', 6.50),
  ('Calendar', 'Calendar made from 100% post-consumer recycled paper.', 6, 'images/stationary/recycledcalender.jpg', 2.45),
  ('Spiral bound Notepad', 'This notepad is recycled from manila folders, stationary, and wall papers.', 6, 'images/stationary/spiralbound.jpg', 5.50),
  ('Autograph Book', 'An autograph book with a unique design and made of recycled old autograph books !.', 6, 'images/stationary/oldwest.jpg', 2.65)
  
;

