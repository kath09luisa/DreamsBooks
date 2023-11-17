const validation = new JustValidate("#signup");

validation
    .addField("#nome", [
        {
            rule: "required"
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])
    .addField("#senha", [
        {
            rule: 'required',
          },
          {
            rule: 'password',
          }
    ])
    .addField('#senha_confirmacao', [
        {
          rule: 'required',
        },
        {
          validator: (value, fields) => {
            if (
              fields['#senha'] &&
              fields['#senha'].elem
            ) {
              const repeatPasswordValue =
                fields['#senha'].elem.value;
    
              return value === repeatPasswordValue;
            }
    
            return true;
          },
          errorMessage: 'Passwords should be the same',
        },
      ])
      .addField(
        '#advanced-usage_consent_checkbox',
        [
          {
            rule: 'required',
          },
        ],
        {
          errorsContainer: '#advanced-usage_consent_checkbox-errors-container',
        }
      );
    