const recipes = [
    {
      name: "Tuna Noodle Casserole",
      ingredients: ["hot cooked medium egg noodles", "Cream of Mushroom Soup", "tuna", "frozen peas", "milk", "bread crumbs", "butter"],
    },
    {
      name: "Nuoc Mam",
      ingredients: ["water", "sugar", "lime or lemon juice", "fish sauce", "garlic", "chilies"],
    },
    {
        name: "Chicken Adobo",
        ingredients: ["chicken thigh", "garlic","soy sauce", "white vinegar", "bay leaves", "2 tbsp oil", "onions", "brown sugar", "black pepper", "green onions"],
          
    }
    ,{
        name:"Tomato Soup",
        ingredients: ["Butter", "Yellow onion","Garlic", "Crushed tomatoes", "Chicken stock","Basil","Sugar","black pepper","Heavy Cream","Parmesan cheese"],
          
    }
    // Add more recipes as needed
  ];
  function findMatchingRecipes(userIngredients) {
    const matchingRecipes = [];
  
    // Loop through each recipe
    for (const recipe of recipes) {
      let allIngredientsFound = true;
  
      // Loop through each ingredient in the recipe
      for (const ingredient of recipe.ingredients) {
        // Check if the ingredient is in the user's ingredients
        if (!userIngredients.includes(ingredient)) {
          allIngredientsFound = false;
          break; // If any ingredient is not found, move to the next recipe
        }
      }
  
      // If all ingredients are found, add the recipe to matchingRecipes
      if (allIngredientsFound) {
        matchingRecipes.push(recipe);
      }
    }
  
    return matchingRecipes;
  }
  
  // Example usage:
  const userIngredients = ["hot cooked medium egg noodles", "tuna", "milk"];
  const matchingRecipes = findMatchingRecipes(userIngredients);
  console.log("Matching Recipes:", matchingRecipes);
    